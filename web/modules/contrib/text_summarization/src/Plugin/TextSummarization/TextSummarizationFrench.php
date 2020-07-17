<?php

namespace Drupal\text_summarization\Plugin\TextSummarization;

use PhpScience\TextRank\Tool\StopWords\French;
use Drupal\text_summarization\TextSummarizationPluginBase;

/**
 * Defines the text summarization in French.
 * @package Drupal\text_summarization\Plugin\TextSummarization
 *
 * @TextSummarization(
 *   id = "text_summarization_french",
 *   label = @Translation("The text summarization plugin for French language."),
 * )
 */
class TextSummarizationFrench extends TextSummarizationPluginBase {


  /**
   * {@inheritdoc}
   */
  public function getStopWords() {
    // French implementation for stopwords/junk words:
    $stopWords = new French();
    return $stopWords;
  }

}
