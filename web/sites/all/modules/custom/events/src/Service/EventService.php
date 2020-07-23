<?php

namespace Drupal\events\Service;

use Drupal\Core\Session\AccountProxy;
use Drupal\Core\Database\Connection;
/**
 * EventService is a Drupal 8 service.
 */
class EventService
{
  private $currentUser;
  private $connection;
  /**
   * Part of the DependencyInjection magic happening here.
   */
  public function __construct(AccountProxy $currentUser, Connection $connection)
  {
    $this->currentUser = $currentUser;
    $this->connection = $connection;
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
    $this->connection->update('tbl_event')
    ->fields($fields)
    ->condition('id', $eventId)
    ->execute();
  }

  public function insertIntoTable(array $fields, string $tableName)
  {
    return $this->connection->insert($tableName)
      ->fields($fields)
      ->execute();
  }

  public function innerJoinWithEventAndGallery(int $eventId)
  {
    $query = $this->connection->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
    $query->leftJoin('tbl_gallery', 'g', 'e.id = g.event_id');
    $query->fields('g', ['path']);
    $query->condition('e.id', $eventId);
    $record = $query->execute()->fetchAssoc();
    return $record;
  }

  public function getAllEvents()
  {
    $query = $this->connection->select('tbl_event', 'e')->fields('e', ['id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category']);
    $results = $query->execute()->fetchAllAssoc('id');
    return $results;
  }


  public function deleteEvent(int $eventId)
  {
    $this->connection->delete('tbl_gallery')
    ->condition('event_id', $eventId)
      ->execute();

    // Delete From tbl_event.
    $this->connection->delete('tbl_event')
    ->condition('id', $eventId)
      ->execute();
  }
}
