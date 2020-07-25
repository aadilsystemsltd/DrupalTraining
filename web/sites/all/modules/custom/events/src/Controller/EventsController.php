<?php

namespace Drupal\events\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\events\Service\EventService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EventsController extends ControllerBase
{
  private $eventService;
  public function __construct(EventService $eventService)
  {
    $this->eventService = $eventService;
  }

  public static function create(ContainerInterface $container)
  {
    $eventService = $container->get('events.DbService');
    return new static($eventService);
  }

  public function display()
  {
    $header = ['Id', 'Title', 'Participants', 'Image', 'Start_End_Date', 'Category', 'Edit', 'Delete'];
    $results = $this->eventService->getAllEvents();
    return [
      '#theme' => 'event_bootstrap_table_hook',
      '#header' => $header,
      '#rows' => $results
    ];
  }
}
