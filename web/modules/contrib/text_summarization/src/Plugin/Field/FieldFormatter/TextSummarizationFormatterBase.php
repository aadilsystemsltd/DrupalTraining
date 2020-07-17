<?php

namespace Drupal\text_summarization\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Link;
use Drupal\text_summarization\TextSummarizationPluginInterface;
use PhpScience\TextRank\TextRankFacade;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Render\Element;
use Symfony\Component\DependencyInjection\ContainerInterface;
use \Drupal\text_summarization\Services\TextRankHelper;

abstract class TextSummarizationFormatterBase extends FormatterBase implements ContainerFactoryPluginInterface{

  /**
   * The text rank facade
   *
   * @var \PhpScience\TextRank\TextRankFacade
   */
  protected $textRank;
  /**
   * The text rank facade
   *
   * @var \Drupal\text_summarization\Services\TextRankHelper
   */
  protected $textRankHelper;

  protected $languageManager;

  /**
   * Constructs a new TextSummarizationFormatter.
   *
   * @param string $plugin_id
   *   The plugin_id for the formatter.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The definition of the field to which the formatter is associated.
   * @param array $settings
   *   The formatter settings.
   * @param string $label
   *   The formatter label display setting.
   * @param string $view_mode
   *   The view mode.
   * @param array $third_party_settings
   *   Third party settings.
   * @param \PhpScience\TextRank\TextRankFacade $text_rank
   *   The text rank facade.
   * @param \Drupal\text_summarization\Services\TextRankHelper $text_rank_helper
   *   The text rank helper.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, LanguageManagerInterface $language_manager, TextRankFacade $text_rank, TextRankHelper $text_rank_helper) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);

    $this->languageManager = $language_manager;
    $this->textRank = $text_rank;
    $this->textRankHelper = $text_rank_helper;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('language_manager'),
      $container->get('text_summarization.textrank'),
      $container->get('text_summarization.textrank.helper'));
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
        'trim_length' => '600',
        'trim_type' => "chars"
      ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    
    $element['trim_length'] = [
      '#title' => t('Trimmed limit'),
      '#type' => 'number',
      '#field_suffix' => t('characters'),
      '#default_value' => $this->getSetting('trim_length'),
      '#description' => t('The trimmed %label field will end at the last full sentence before this character limit.', ['%label' => $this->fieldDefinition->getLabel()]),
      '#min' => 1,
      '#required' => TRUE,
    ];

    $element['trim_type'] = [
      '#title' => $this->t('Trim units'),
      '#type' => 'select',
      '#options' => [
        'chars' => $this->t("Characters"),
        'words' => $this->t("Words"),
      ],
      '#default_value' => $this->getSetting('trim_type'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    
    $type = $this->t('words');
    if ($this->getSetting('trim_type') == 'chars') {
      $type = $this->t('characters');
    }

    $summary[] = t('Trimmed limit: @trim_length @type', [
      '@trim_length' => $this->getSetting('trim_length'),
      '@type' => $type
      ]
    );

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode = NULL) {

    $elements = [];

    $setting_trim_options = $this->getSetting('summary_options');

    $entity = $items->getEntity();

    foreach ($items as $delta => $item) {
      //Summary Text
      $elements[$delta] = $this->getSummarizeText($item);
    }

    return $elements;
  }

  /**
   * Creates summary text
   *
   * @param object $text
   *   A string value.
   *
   * @return string
   *   A formatted summary using the chosen format.
   */
  abstract protected function getTextRankSummary($text);

  /**
   * Get Important Sentences
   * @param String $text field text
   */
  protected function getSummarizeText($item, $trim_length = NULL, $trim_type = NULL){
    
    $summary_text = $this->getTextRankSummary($item);
    $summary = $this->textRankHelper->combine_sentences_output($summary_text);
    
    $trim_length = $this->getSetting('trim_length');
    $trim_type = $this->getSetting('trim_type');

    $trimmed_summary = $this->textRankHelper->getTrimmedText($summary, $trim_length, $trim_type);

    //trim the most important sentence
    
    $elements = [
      '#type' => 'processed_text',
      '#text' => $trimmed_summary,
      '#format' => $item->format,
      '#langcode' => $item->getLangcode(),
    ];
    return $elements;
  }

  /**
   * Get stopwords by content language.
   * @param $langcode
   *
   * @return mixed
   * @throws \Drupal\Component\Plugin\Exception\PluginException
   */
  protected function getStopWordsByLanguage($langcode) {
    return $this->textRankHelper->getStopWordsByLanguage($langcode);
  }

  /**
   *
   * @param $html
   *
   * @return string
   */
  protected function getParagraphsFromHTML($html){
    // Get all paragraphs in document
    $paragraphs = $this->textRankHelper->getParagraphs($html);

    return $paragraphs;
  }
}
