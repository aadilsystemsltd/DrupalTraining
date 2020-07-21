<?php

/**
 * @file
 * Contains \Drupal\event\Form\Create.
 */

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;
use Drupal\file\Entity\File;
use Symfony\Component\HttpFoundation\RedirectResponse;



class CreateEvent extends FormBase
{
  use MessengerTrait;
  private $getIdFromRoute;
  public function __construct()
  {
    $getIdFromRoute = \Drupal::request()->query->get('uid');
  }

  public function getFormId()
  {
    return 'event_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $record = array();
    if (isset($this->getIdFromRoute)) {
      $record = \Drupal::service('events.DbService')->innerJoinWithEventAndGallery($this->getIdFromRoute);
    }

    $form['Title'] = array(
      '#type' => 'textfield',
      '#title' => ('Title'),
      '#required' => TRUE,
      '#default_value' => (isset($record['Title']) && $this->getIdFromRoute) ? $record['Title'] : '',
    );

    $form['Participants'] = array(
      '#type' => 'number',
      '#title' => ('Max Event Participants:'),
      '#required' => TRUE,
      '#default_value' => (isset($record['Participants']) && $this->getIdFromRoute) ? $record['Participants'] : '',
    );

    $form['uploaded_Image'] = array(
      '#type' => 'file',
      '#title' => ('Event Image'),
      '#description' => t('Allowed extensions: gif png jpg jpeg'),
      '#upload_location' => 'public://pictures/EventImages',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        'file_validate_size' => array(1 * 1024 * 1024),
      )
    );


    $form['Gallery'] = array(
      '#type' => 'managed_file',
      '#title' => ('Event Gallery:'),
      '#multiple' => TRUE,
      '#upload_location' => 'public://pictures/Gallery',
      '#upload_validators' => array(
        'file_validate_extensions' => array('png gif jpg jpeg'),
        'file_validate_size' => array(25600000)
      ),
    );

    $form['Start_End_Date'] = array(
      '#type' => 'date',
      '#title' => ('Start & End Date:'),
      '#required' => TRUE,
      '#default_value' => (isset($record['Start_End_Date']) && $this->getIdFromRoute) ? $record['Start_End_Date'] : '',
    );

    $form['Category'] = array(
      '#type' => 'select',
      '#title' => ('Category'),
      '#options' => $this->returnTaxonomy('event_category'),
      '#default_value' => (isset($record['Category']) && $this->getIdFromRoute) ? $record['Category'] : '',
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  private function returnTaxonomy(string $vocabulary_name)
  {
    $terms = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term")->loadTree($vocabulary_name, $parent = 0, $max_depth = NULL, $load_entities = FALSE);
    foreach ($terms as $item) {
      $key = $item->tid;
      $value = $item->name;
      $dropdown_array[$key] = $value;
    }
    return $dropdown_array;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $field = $form_state->getValues();
    $title = $field['Title'];
    $participants = $field['Participants'];
    $image = $field['Image'];
    $gallery = $field['Gallery'];
    $start_end_date = $field['Start_End_Date'];
    $category = $field['Category'];
    $field  = array(
      'Title'   =>  $title,
      'Participants' =>  $participants,
      'Image' =>  $image,
      'Start_End_Date' => $start_end_date,
      'Category' => $category,
    );

    if (isset($this->getIdFromRoute)) {
      \Drupal::service('events.DbService')->updateByEventId($field, $this->getIdFromRoute);
      $this->messenger()->addMessage("succesfully updated");
      $form_state->setRedirect('events.showEvents');
      return;
    }
    // If Record Is Not Updated.
    $resultedEventId = \Drupal::service('events.DbService')->insertIntoTable($field, 'tbl_event');

    foreach ($gallery as $value) {
      $galleryField  = array(
        'path'   =>  $value,
        'event_id' =>  $resultedEventId
      );
      \Drupal::service('events.DbService')->insertIntoTable($galleryField, 'tbl_gallery');
    }

    $this->messenger()->addMessage("succesfully saved");
    $response = new RedirectResponse("/display");
    $response->send();
  }
}
