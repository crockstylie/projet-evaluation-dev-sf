<?php

namespace Crock\CharacterListBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ApiCallEvent extends Event
{
  protected $request;

  public function __construct($request)
  {
    $this->request = $request;
  }

  public function getRequest()
  {
    return $this->request;
  }
}