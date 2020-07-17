<?php

/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 * Entering controller for demo purpose.
 */

namespace Drupal\hello_world\Controller;

class HelloController
{
  public function content()
  {
    return array(
      '#type' => 'markup',
      '#markup' => ('Hello, World!'),
    );
  }
}
