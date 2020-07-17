<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use Drupal\text_summarization\TextSummarizationPluginBase;
use PhpScience\TextRank\Tool\StopWords\Spanish;

/**
 * Defines the text summarization in Spanish.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_spanish",
 *   label = @Translation("The text summarization plugin for Spanish language."),
 * )
 */
class TextSummarizationSpanish extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // Spanish implementation for stopwords/junk words:
    $stopWords = new Spanish();
    return $stopWords;
  }

}
