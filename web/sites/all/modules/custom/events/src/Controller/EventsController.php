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
    // Create table header.
    $header_table = array(
      'id' =>    t('SrNo'),
      'Title' => t('Title'),
      'Participants' => t('Participants'),
      'Image' => t('Image'),
      'Start_End_Date' => t('Start_End_Date'),
      'Category' => t('Category'),
      'opt' => t('operations'),
      'opt1' => t('operations'),
    );

    //select records from table
    $database = \Drupal::database();
    $query = $database->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
    $results = $query->execute()->fetchAll();

    $rows = array();
    foreach ($results as $data) {
      $delete = Url::fromUserInput('/event/delete/' . $data->id);
      $edit = Url::fromUserInput('/event/create?id=' . $data->id);

      //print the data from table
      $rows[] = array(
        'id' => $data->id,
        'Title' => $data->Title,
        'Participants' => $data->Participants,
        'Image' => $data->Image,
        'Start_End_Date' => $data->Start_End_Date,
        'Category' => $data->Category,

        \Drupal::l('Delete', $delete),
        \Drupal::l('Edit', $edit),
      );
    }
    //display data in site
    $form['table'] = [
      '#type' => 'table',
      '#header' => $header_table,
      '#rows' => $rows,
      '#empty' => t('No Events found'),
    ];

    return $form;
  }
}
