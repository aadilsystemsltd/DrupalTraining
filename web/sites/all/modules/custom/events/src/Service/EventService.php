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
    $this->database = \Drupal::database(); // Inject Db Service...Fix
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
    return $this->database->insert($tableName)
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

  public function getAllEvents()
  {
    $query = $this->database->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
    $results = $query->execute()->fetchAllAssoc('id');
    return $results;
  }


  public function deleteEvent(int $eventId)
  {
    $this->database->delete('tbl_gallery')
    ->condition('event_id', $eventId)
      ->execute();

    // Delete From tbl_event.
    $this->database->delete('tbl_event')
    ->condition('id', $eventId)
      ->execute();
  }
}
