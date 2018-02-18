<?php

namespace Crock\CharacterListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CharacterListController extends Controller
{
  public function indexAction(Request $request)
  {
    $characters = '';

    $request = $this
      ->get('crock_characterlist.starwarslist')
    ;

    $response = $request
      ->performRequest('https://swapi.co/api/people/');

    if (isset($response['data']['results'])) {
      $characters = $response['data']['results'];
    }

    if (isset($response['curlError'])) {
      $this->get('logger')->error($response['curlError']);
    }

    return $this->render('@CrockCharacterList/CharacterList/index.html.twig', [
      'characters' => $characters
    ]);
  }
}