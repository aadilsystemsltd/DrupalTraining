<?php

/**
 * @file
 * Contains \Drupal\event\Form\Create.
 */

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;

use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Create extends FormBase
{
  use MessengerTrait;

  public function __construct()
  {
  }

  public function getFormId()
  {
    return 'event_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $conn = Database::getConnection();
    $record = array();
    if (isset($_GET['id'])) {
      $query = $conn->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
      $query->innerJoin('tbl_gallery', 'g', 'e.id = g.event_id');
      $query->fields('g', ['path']);
      $query->condition('e.id', $_GET['id']);
      $record = $query->execute()->fetchAssoc();
    }

    $form['Title'] = array(
      '#type' => 'textfield',
      '#title' => ('Title'),
      '#required' => TRUE,
      '#default_value' => (isset($record['Title']) && $_GET['id']) ? $record['Title'] : '',
    );

    $form['Participants'] = array(
      '#type' => 'number',
      '#title' => ('Max Event Participants:'),
      '#required' => TRUE,
      '#default_value' => (isset($record['Participants']) && $_GET['id']) ? $record['Participants'] : '',
    );

    $form['Image'] = array(
      '#type' => 'managed_file',
      '#title' => ('Image'),
      '#required' => TRUE,
      '#description' => ('Allowed extensions: gif png jpg jpeg'),
      '#upload_location' => 'public://pictures/',
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        // Pass the maximum file size in bytes
        'file_validate_size' => array(1 * 1024 * 1024),
      )
    );

    $form['Gallery'] = array(
      '#type' => 'managed_file',
      '#title' => ('Event Gallery:'),
      '#multiple' => TRUE,
      '#required' => TRUE,
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
      '#default_value' => (isset($record['Start_End_Date']) && $_GET['id']) ? $record['Start_End_Date'] : '',
    );

    $form['Category'] = array(
      '#type' => 'select',
      '#title' => ('Category'),
      '#options' => $this->returnTaxonomy('event_category'),
      '#default_value' => (isset($record['Category']) && $_GET['id']) ? $record['Category'] : '',
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
    if (strlen($form_state->getValue('Event_Title')) == null) {
      $form_state->setErrorByName('Event_Title', $this->t('Event Name is Required.'));
    }
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
    $query = \Drupal::database();

    if (isset($_GET['id']))
    {
      $query->update('tbl_event')
        ->fields($field)
        ->condition('id', $_GET['id'])
        ->execute();

      $this->messenger()->addMessage("succesfully updated");
      $form_state->setRedirect('events.showEvents');
      return;
    }
    // If Record Is Not Updated.
    $resultedEventId = $query->insert('tbl_event')
      ->fields($field)
      ->execute();

    foreach ($gallery as $value) {
      $galleryField  = array(
        'path'   =>  $value,
        'event_id' =>  $resultedEventId
      );
      $query->insert('tbl_gallery')
        ->fields($galleryField)
        ->execute();
    }

    $this->messenger()->addMessage("succesfully saved");
    $response = new RedirectResponse("/mydata/hello/table");
    $response->send();
  }
}
