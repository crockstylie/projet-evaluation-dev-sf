<?php

namespace Crock\CharacterListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CharacterListController extends Controller
{
  public function indexAction()
  {
    return $this->render('@CrockCharacterList/CharacterList/index.html.twig');
  }
}