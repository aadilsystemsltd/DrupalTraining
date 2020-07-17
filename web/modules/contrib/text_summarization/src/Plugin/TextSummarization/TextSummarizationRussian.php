<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use Drupal\text_summarization\TextSummarizationPluginBase;
use PhpScience\TextRank\Tool\StopWords\Russian;

/**
 * Defines the text summarization in Russain.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_russain",
 *   label = @Translation("The text summarization plugin for Russian language."),
 * )
 */
class TextSummarizationRussian extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // Russian implementation for stopwords/junk words:
    $stopWords = new Russian();
    return $stopWords;
  }

}
