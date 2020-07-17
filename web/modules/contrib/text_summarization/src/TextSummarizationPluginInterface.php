<?php

namespace Drupal\text_summarization;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for in-place editors plugins.
 *
 * @see \Drupal\text_summarization\Annotation\TextSummarization
 * @see \Drupal\text_summarization\TextSummarizationPluginBase
 * @see \Drupal\text_summarization\TextSummarizationPluginInterface
 * @see plugin_api
 */
interface TextSummarizationPluginInterface extends PluginInspectionInterface {

  /**
   * Returns the stopwords for specific language.
   *
   * @return array
   *   An array of attachments, for use with #attached.
   *
   */
  public function geStopWords();

}
