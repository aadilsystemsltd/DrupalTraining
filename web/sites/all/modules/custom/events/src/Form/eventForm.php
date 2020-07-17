<?php

/**
 * @file
 * Contains \Drupal\event\Form\EventForm.
 */

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class EventForm extends FormBase
{

  public function getFormId()
  {
    return 'event_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['Event_Title'] = array(
      '#type' => 'textfield',
      '#title' => ('Title'),
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
      '#upload_validators' => array(
        'file_validate_extensions' => array('gif png jpg jpeg'),
        // Pass the maximum file size in bytes
        'file_validate_size' => array(1 * 1024 * 1024),
      ),
      '#upload_location' => 'public://society/'
    );

    $form['Event_Gallery'] = array(
      '#type' => 'number',
      '#title' => ('Max Event Participants:'),
      '#required' => TRUE,
    );

    $form['Event_Start_End_Date'] = array(
      '#type' => 'date',
      '#title' => ('Start & End Date:'),
      '#required' => TRUE,
    );
    $form['Event_ Category'] = array(
      '#type' => 'select',
      '#title' => ('Category:'),
      '#options' => array(
        'female' => ('Female'),
        'male' => ('Male'),
      ),
      '#required' => TRUE,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

    if (strlen($form_state->getValue('Event_Title')) == null) {
      $form_state->setErrorByName('Event_Title', $this->t('Event Name is Required.'));
    }
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
    foreach ($form_state->getValues() as $key => $value) {
    }
  }
}
