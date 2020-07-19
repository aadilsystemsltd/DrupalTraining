<?php

/**
 * @file
 * Contains \Drupal\event\Form\EventForm.
 */

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerTrait;

class EventForm extends FormBase
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
    $form['Event_Title'] = array(
      '#type' => 'textfield',
      '#title' => ('Title'),
      '#required' => TRUE,
    );

    $form['Event_Participants'] = array(
      '#type' => 'number',
      '#title' => ('Max Event Participants:'),
      '#required' => TRUE,
    );

    $form['Event_Image'] = array(
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

    $form['Event_Gallery'] = array(
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

    $form['Event_Start_End_Date'] = array(
      '#type' => 'date',
      '#title' => ('Start & End Date:'),
      '#required' => TRUE,
    );

    $form['Event_ Category'] = array(
      '#type' => 'select',
      '#title' => ('Category'),
      '#options' => $this->returnTaxonomy('event_category'),
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
    foreach ($form_state->getValues() as $key => $value) {
      // drupal_set_message(); depreciated in drupal 8.5
      $this->messenger()->addMessage($key . ': ' . $value);
    }
  }
}
