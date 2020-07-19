<?php

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Render\Element;
use Drupal\Core\Messenger\MessengerTrait;


class DeleteForm extends ConfirmFormBase
{
  use MessengerTrait;

  public function getFormId()
  {
    return 'delete_form';
  }
  public $cid;
  public function getQuestion()
  {
    return t('Do you want to delete %cid?', array('%cid' => $this->cid));
  }
  public function getCancelUrl()
  {
    return new Url('events.showEvents');
  }
  public function getDescription()
  {
    return t('Only do this if you are sure!');
  }

  public function getConfirmText()
  {
    return t('Delete it!');
  }


  public function getCancelText()
  {
    return t('Cancel');
  }


  public function buildForm(array $form, FormStateInterface $form_state, $cid = NULL)
  {

    $this->id = $cid;
    return parent::buildForm($form, $form_state);
  }


  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    parent::validateForm($form, $form_state);
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $query = \Drupal::database();
    $query->delete('tbl_event')
      ->condition('id', $this->id)
      ->execute();
    $this->messenger()->addMessage("succesfully deleted");
    $form_state->setRedirect('events.showEvents');
  }
}
