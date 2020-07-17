<?php

/**
 * @file
 * Contains \Drupal\text_summarization\Services\TextRankHelper.
 */

namespace Drupal\text_summarization\Services;

use Drupal\Component\Utility\Html;
use Drupal\text_summarization\Truncate\TruncateHTML;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\migrate\Plugin\MigrationPluginManagerInterface;
use Drupal\text_summarization\TextSummarizationPluginInterface;
use Drupal\text_summarization\TextSummarizationPluginManager;

/**
 * Class TextRankHelper
 */
class TextRankHelper
{
    protected $pluginManager;
 /**
     * Constructs a new TextSummarizationPluginManager object.
     * @param \Drupal\migrate\Plugin\TextSummarizationPluginManager $plugin_manager
     */
    public function __construct(TextSummarizationPluginManager $plugin_manager)
    {
        $this->pluginManager = $plugin_manager;
    }


    /**
     * Utility function for combiing sentences
     * @param String $sentences
     * @return String $combined_sentences
     */
    public function combine_sentences_output($sentences)
    {

        $combined_sentences = '';

        if (empty($sentences)) {
            return '';
        }

        if (is_string($sentences)) {
            return $sentences;
        }

        $combined_sentences = implode(" ", $sentences);

        return $combined_sentences;
    }

    /**
     *
     * @param $html
     *
     * @return string
     */
    public function getParagraphs($html)
    {
        $document = html::load($html);
        // Get all paragraphs in document
        $paragraphs = "";
        $pTags = $document->getElementsByTagName("p"); // DOMNodeList Object

        foreach ($pTags as $tag) { // DOMElement Object
            $text = $tag->nodeValue;
            // Remove all the tags inside p tags.
            $cleanText = strip_tags($text);
            // Remove empty p tags as well.
            $cleanText = preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $cleanText);
            // Remove whitespaces.
            $cleanText = trim($cleanText);
            if (isset($cleanText) && $cleanText != '') {
                $paragraphs .= $cleanText . " ";
            }
        }

        return rtrim($paragraphs);
    }

    /**
   *
   * @param $summary_text
   * @param $length
   * @param $type
   *
   * @return string
   */
public function getTrimmedText($summary_text, $length, $type){
  
    $output = '';
    
    $truncate = new TruncateHTML();
  
    if ($type == 'words') {
      $output = $truncate->truncateWords($summary_text, $length);
    }
    else {
      $output = $truncate->truncateChars($summary_text, $length);
    }
  
    return $output;
  }

/**
   * Get stopwords by content language.
   * @param $langcode
   *
   * @return mixed
   * @throws \Drupal\Component\Plugin\Exception\PluginException
   */
  public function getStopWordsByLanguage($langcode) {
    $plugin_id = "";
    //@todo Needs to create plugins for each language and display error message if matching lanague not found.
    switch ($langcode) {
      case 'en':
        $plugin_id = 'text_summarization_english';
        break;
      case 'de':
        $plugin_id = 'text_summarization_german';
        break;
      case 'fr':
        $plugin_id = 'text_summarization_french';
        break;
      case 'it':
        $plugin_id = 'text_summarization_italian';
        break;
      case 'ru':
        $plugin_id = 'text_summarization_russian';
        break;
      case 'es':
        $plugin_id = 'text_summarization_spanish';
        break;
      case 'nb':
      case 'nn':
        $plugin_id = 'text_summarization_norwegian';
        break;
      default:
        echo "Language not found";
    }

    $plugin = $this->pluginManager->createInstance($plugin_id);
    $stopWords = $plugin->getStopWords();

    return $stopWords;
  }

}
