<?php

namespace Crock\CharacterListBundle\StarWarsList;

class CrockStarWarsList
{
  public function performRequest($siteUrl)
  {
    $curlError = '';
    $data = '';
    $dataArray = ['data' => '', 'curlError' => ''];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $siteUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

    if($httpCode !== 200)
    {
      $curlError = 'Erreur Curl : code HTTP(' . $httpCode . ') - Effective URL(' . $effectiveUrl . ')';
    } else {
      $data = json_decode($response, true);
    }

    $dataArray['data'] = $data;
    $dataArray['curlError'] = $curlError;

    curl_close($ch);

    return $dataArray;
  }
}