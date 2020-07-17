<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use PhpScience\TextRank\Tool\StopWords\English;
use Drupal\text_summarization\TextSummarizationPluginBase;

/**
 * Defines the text summarization in English.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_english",
 *   label = @Translation("The text summarization plugin for English language."),
 * )
 */
class TextSummarizationEnglish extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // English implementation for stopwords/junk words:
    $stopWords = new English();
    return $stopWords;
  }

}
