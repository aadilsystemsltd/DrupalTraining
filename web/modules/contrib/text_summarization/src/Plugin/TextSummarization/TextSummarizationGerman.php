<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use PhpScience\TextRank\Tool\StopWords\German;
use Drupal\text_summarization\TextSummarizationPluginBase;

/**
 * Defines the text summarization in German.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_german",
 *   label = @Translation("The text summarization plugin for German language."),
 * )
 */
class TextSummarizationGerman extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // German implementation for stopwords/junk words:
    $stopWords = new German();
    return $stopWords;
  }

}
