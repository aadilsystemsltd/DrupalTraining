<?php

/**
 * @file
 * Builds placeholder replacement tokens for node-textrank-summary data.
 */

use Drupal\Core\Render\BubbleableMetadata;

/**
 * Implements hook_token_info().
 */
function text_summarization_token_info()
{
    $info = array();

    $info['tokens']['node']['text_rank_summary'] = [
        'name' => t("Text rank summary"),
        'description' => t("Text rank summary token"),
    ];

    // Return them.
    return $info;
}

/**
 * Implements hook_tokens().
 */
function text_summarization_tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata)
{
    if (isset($options['langcode'])) {
        $langcode = $options['langcode'];
      }

    $replacements = array();

    if ($type == 'node' && !empty($data['node'])) {
        /** @var \Drupal\node\NodeInterface $node */
        $node = $data['node'];
        foreach ($tokens as $name => $original) {
            // Find the desired token by name
            switch ($name) {
                case 'text_rank_summary':
                    $translation = \Drupal::service('entity.repository')->getTranslationFromContext($node, $langcode, ['operation' => 'node_tokens']);
                    if ($translation->hasField('body') && ($items = $translation->get('body')) && !$items->isEmpty()) {
                        $item = $items[0];
                        $output = $item->processed;
                        // Generate an optionally trimmed text ranked summary of the body field.

                        // Get the 'trim_length' and 'trim_type' used for the 'token' mode, if
                        // present, or use the default trim_length and 'trim_type'.
                        $display_options = \Drupal::service('entity_display.repository')
                            ->getViewDisplay('node', $node->getType(), 'token')
                            ->getComponent('body');
                        if (isset($display_options['settings']['trim_length']) && isset($display_options['settings']['trim_type'])) {
                            $length = $display_options['settings']['trim_length'];
                            $trim_type = $display_options['settings']['trim_type'];
                        } else {
                            $settings = \Drupal::service('plugin.manager.field.formatter')->getDefaultSettings('text_summarization');
                            $length = $settings['trim_length'];
                            $trim_type = $display_options['settings']['trim_type'];
                        }
                        $textRankHelper = \Drupal::service('text_summarization.textrank.helper');
                        $stopWords = $textRankHelper->getStopWordsByLanguage($langcode);
                        $textRank = \Drupal::service('text_summarization.textrank');
                        $textRank->setStopWords($stopWords);

                        // We are only interested in paragraphs for making summary.
                        $paragraphs = $textRankHelper->getParagraphs($output);
                        $sentences = $textRank->summarizeTextCompound($paragraphs);
                        $output = $textRankHelper->getTrimmedText($textRankHelper->combine_sentences_output($sentences), $length, $trim_type);
                        $replacements[$original] = $output;
                    }
                    break;
            }
        }
    }
    // Return the replacements.
    return $replacements;
}
