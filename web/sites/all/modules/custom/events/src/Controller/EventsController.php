<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

class EventsController extends ControllerBase
{

  public function index()
  {
    return [
      '#theme' => 'event_custom_hook',
      '#variable1' => 'This is not just a default text!'
    ];
  }

  public function display()
  {
    $header = ['Id', 'Title', 'Participants','Image','Start_End_Date', 'Category', 'Edit', 'Delete'];
    $results = \Drupal::service('events.DbService')->getAllEvents();
    return [
      '#theme' => 'event_bootstrap_table_hook',
      '#header' => $header,
      '#rows' =>  $results,
    ];
  }
}
