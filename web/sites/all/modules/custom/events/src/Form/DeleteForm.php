<?php

namespace Drupal\events\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Url;
use Drupal\Core\Messenger\MessengerTrait;

class DeleteForm extends ConfirmFormBase
{
  use MessengerTrait;
  private $cid;

  public function getFormId()
  {
    return 'delete_form';
  }

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
    $this->cid = $cid;
    $form['cid'] = array(
      '#type' => 'hidden',
      '#value' => $cid,
    );
    return parent::buildForm($form, $form_state);
  }


  public function validateForm(array &$form, FormStateInterface $form_state)
  {
    parent::validateForm($form, $form_state);
  }


  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $query = \Drupal::database();

    // Delete From tbl_gallery First Because of Foriegn Key Constraints.
    $query->delete('tbl_gallery')
      ->condition('event_id', $this->cid)
      ->execute();

      // Delete From tbl_event.
      $query->delete('tbl_event')
        ->condition('id', $this->cid)
        ->execute();
      $this->messenger()->addMessage("succesfully deleted");
      $form_state->setRedirect('events.showEvents');
  }
}
