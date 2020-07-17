<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use PhpScience\TextRank\Tool\StopWords\Italian;
use Drupal\text_summarization\TextSummarizationPluginBase;

/**
 * Defines the text summarization in Italian.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_italian",
 *   label = @Translation("The text summarization plugin for Italian language."),
 * )
 */
class TextSummarizationItalian extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // Italian implementation for stopwords/junk words:
    $stopWords = new Italian();
    return $stopWords;
  }

}
