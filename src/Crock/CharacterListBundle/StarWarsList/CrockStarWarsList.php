<?php

namespace Crock\CharacterListBundle\StarWarsList;

class CrockStarWarsList
{
  public function performRequest($siteUrl)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $siteUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    $data = json_decode($response, true);

    return $data;
  }
}