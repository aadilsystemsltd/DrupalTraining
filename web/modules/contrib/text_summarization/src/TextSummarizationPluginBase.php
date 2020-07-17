<?php

namespace Drupal\text_summarization;

use Drupal\Core\Plugin\PluginBase;

/**
 * Defines a base in-place editor implementation.
 *
 * @see \Drupal\text_summarization\Annotation\TextSummarization
 * @see \Drupal\text_summarization\TextSummarizationPluginBase
 * @see \Drupal\text_summarization\TextSummarizationPluginInterface
 * @see plugin_api
 */
abstract class TextSummarizationPluginBase extends PluginBase implements TextSummarizationPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function geStopWords() {
    return [];
  }

}
