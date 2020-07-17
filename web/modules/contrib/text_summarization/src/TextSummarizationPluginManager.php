<?php

namespace Drupal\text_summarization;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Provides an text summarization manager.
 *
 *
 * @see \Drupal\text_summarization\Annotation\TextSummarization
 * @see \Drupal\text_summarization\TextSummarizationPluginBase
 * @see \Drupal\text_summarization\TextSummarizationPluginInterface
 * @see plugin_api
 */
class TextSummarizationPluginManager extends DefaultPluginManager {

  protected $settings;

  /**
   * Constructor for TaskPluginManager objects.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct(
      'Plugin/TextSummarization',
      $namespaces,
      $module_handler,
      'Drupal\text_summarization\TextSummarizationPluginInterface',
      'Drupal\text_summarization\Annotation\TextSummarization'
    );

    $this->alterInfo('text_summarization_plugin_info');
    $this->setCacheBackend($cache_backend, 'text_summarization_plugins');
  }


}
