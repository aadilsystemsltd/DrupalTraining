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

  public function content()
  {
    $myText = 'This is not just a default text!';
    $myNumber = 1;
    $myArray = [1, 2, 3, 4, 5, 6];

    return [
      '#theme' => 'test_custom_hook',
      '#variable1' => $myText,
      '#variable2' => $myNumber,
      '#variable3' => $myArray,
      '#attached' => [
        'library' => [
          'events/events-styles', //include our custom library for this response
        ]
      ]
    ];
  }
}
