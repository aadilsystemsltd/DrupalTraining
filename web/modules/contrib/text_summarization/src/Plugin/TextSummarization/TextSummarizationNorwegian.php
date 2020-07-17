<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use PhpScience\TextRank\Tool\StopWords\Norwegian;
use Drupal\text_summarization\TextSummarizationPluginBase;

/**
 * Defines the text summarization in Norwegian.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_norwegian",
 *   label = @Translation("The text summarization plugin for Norwegian language."),
 * )
 */
class TextSummarizationNorwegian extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // Norwegian implementation for stopwords/junk words:
    $stopWords = new Norwegian();
    return $stopWords;
  }

}
