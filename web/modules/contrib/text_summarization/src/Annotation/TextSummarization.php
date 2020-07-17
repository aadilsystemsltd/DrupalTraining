<?php

namespace Drupal\text_summarization\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an TextSummarization annotation object.
 *
 * Plugin Namespace: Plugin\TextSummarization
 *
 * For a working example, see \Drupal\text_summarization\Plugin\TextSummarization\TextSummarizationEnglish
 *
 * @see \Drupal\text_summarization\Annotation\TextSummarization
 * @see \Drupal\text_summarization\TextSummarizationPluginBase
 * @see \Drupal\text_summarization\TextSummarizationPluginInterface

 * @see plugin_api
 *
 * @Annotation
 */
class TextSummarization extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the editor plugin.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $label;

}
