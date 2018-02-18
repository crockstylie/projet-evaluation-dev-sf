<?php

namespace Crock\CharacterListBundle\ApiCall;

class ApiCallEventListener
{

  protected $apiCallLogIterator;

  public function __construct(ApiCallLogIterator $apiCallLogIterator)
  {
    $this->apiCallLogIterator = $apiCallLogIterator;
  }

  public function apiLogIterate()
  {
    $this->apiCallLogIterator->iterateApiCallsInFile();
  }
}