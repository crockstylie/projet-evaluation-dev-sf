<?php

namespace Crock\CharacterListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CharacterListController extends Controller
{
  public function indexAction(Request $request)
  {
    $request = $this
      ->get('crock_characterlist.starwarslist')
    ;

    $response = $request
      ->performRequest('https://swapi.co/api/people/');

    $characters = $response['results'];

    return $this->render('@CrockCharacterList/CharacterList/index.html.twig', [
      'characters' => $characters
    ]);
  }
}