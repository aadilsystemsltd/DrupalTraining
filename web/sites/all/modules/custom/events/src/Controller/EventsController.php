<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

class EventsController extends ControllerBase
{
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

  public function getContent()
  {
    // First we'll tell the user what's going on. This content can be found
    // in the twig template file: templates/description.html.twig.
    // @todo: Set up links to create nodes and point to devel module.
    $build = [
      'description' => [
        '#theme' => 'events_description',
        '#description' => 'foo',
        '#attributes' => [],
      ],
    ];
    return $build;
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
    $query = $database->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants','Image','Start_End_Date', 'Category']);
    $query->innerJoin('tbl_gallery', 'g', 'e.id = g.event_id');
    $query->fields('g',['path']);
    $results = $query->execute()->fetchAll();

    $rows = array();
    foreach ($results as $data) {
      $delete = Url::fromUserInput('/event/delete/' . $data->id);
      $edit   = Url::fromUserInput('/event/create?id=' . $data->id);

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
