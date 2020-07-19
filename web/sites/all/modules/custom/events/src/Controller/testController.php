<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;

class TestController extends ControllerBase
{
  public function index()
  {
    return [
      '#markup' => 'Hello, world',
    ];
  }
}
