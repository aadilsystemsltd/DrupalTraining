<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;

class EventsController extends ControllerBase
{
  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function myPage()
  {
    // return [
    //   '#markup' => 'Hello, world',
    // ];
    $element = array('#markup' => 'Frame all your needed contents',);
    return $element;
  }

  public function content()
  {
    // Do something with your variables here.
    $myText = 'This is not just a default text!';
    $myNumber = 1;
    $myArray = [1, 2, 3, 4, 5, 6];

    return [
      // Your theme hook name.
      '#theme' => 'event_custom_theme_hook',
      // Your variables.
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
