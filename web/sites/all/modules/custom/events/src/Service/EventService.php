<?php

namespace Drupal\events\Service;

use Drupal\Core\Session\AccountProxy;

/**
 * EventService is a Drupal 8 service.
 */
class EventService
{

  private $currentUser;
  private $database;

  /**
   * Part of the DependencyInjection magic happening here.
   */
  public function __construct(AccountProxy $currentUser)
  {
    $this->currentUser = $currentUser;
    $this->database = \Drupal::database();
  }

  /**
   * Returns a a Drupal user.
   */
  public function userName()
  {
    return $this->currentUser->getDisplayName();
  }

  public function updateTableByEventId(array $fields, int $eventId)
  {
    $this->database->update('tbl_event')
      ->fields($fields)
      ->condition('id', $eventId)
      ->execute();
  }

  public function insertIntoTable(array $fields, string $tableName)
  {
    $this->database->insert($tableName)
      ->fields($fields)
      ->execute();
  }

  public function innerJoinWithEventAndGallery(int $eventId)
  {
    $query = $this->database->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
    $query->innerJoin('tbl_gallery', 'g', 'e.id = g.event_id');
    $query->fields('g', ['path']);
    $query->condition('e.id', $eventId);
    $record = $query->execute()->fetchAssoc();
    return $record;
  }
}
