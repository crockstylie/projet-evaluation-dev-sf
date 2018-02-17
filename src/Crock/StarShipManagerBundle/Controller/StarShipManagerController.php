<?php

namespace Crock\StarShipManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StarShipManagerController extends Controller
{
  public function indexAction()
  {
    return $this->render('@CrockStarShipManager/StarShipManager/index.html.twig');
  }
}
