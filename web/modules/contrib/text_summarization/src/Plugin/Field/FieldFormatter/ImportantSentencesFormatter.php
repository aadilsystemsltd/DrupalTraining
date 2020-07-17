<?php

namespace Drupal\text_summarization\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use PhpScience\TextRank\Tool\Summarize;

/**
 * Plugin implementation of the 'text_summarization' formatter.
 *
 * @FieldFormatter(
 *   id = "text_summarization",
 *   label = @Translation("Text summarization using TextRank"),
 *   field_types = {
 *     "text",
 *     "text_long",
 *     "text_with_summary",
 *     "string",
 *     "string_long"
 *   },
 *   settings = {
 *     "summary_options" = ""
 *   }
 * )
 */
class ImportantSentencesFormatter extends TextSummarizationFormatterBase{

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'summary_options' => 'summarize_basic_text',
    ] + parent::defaultSettings();
  }

  /**
   * Creates summary text
   *
   * @param object $item
   *   A string value.
   *
   * @return string
   *   A formatted summary using the chosen format.
   */
  protected function getTextRankSummary($item){ 
    $summary_format = $this->getSetting('summary_options');

    $stopWords = $this->getStopWordsByLanguage($item->getLangcode());

    $this->textRank->setStopWords($stopWords);

    // We are only interested in paragraphs for making summary.
    $paragraphs = $this->getParagraphsFromHTML($item->value);

    return $this->textRank->summarizeTextCompound($paragraphs);
  }

}
