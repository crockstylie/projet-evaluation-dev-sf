<?php

namespace Crock\StarShipManagerBundle\Controller;

use Crock\StarShipManagerBundle\Entity\StarShip;
use Crock\StarShipManagerBundle\Form\StarShipType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class StarShipManagerController extends Controller
{
  /**
   * @return \Symfony\Component\HttpFoundation\Response
   * @Security("has_role('ROLE_USER')")
   */
  public function indexAction()
  {
    $listStarShips = $this
      ->getDoctrine()
      ->getManager()
      ->getRepository('CrockStarShipManagerBundle:StarShip')
      ->getStarShips()
    ;
    return $this->render('@CrockStarShipManager/StarShipManager/index.html.twig', [
      'listStarShips' =>$listStarShips
    ]);
  }

  /**
   * @param StarShip $starShip
   * @return \Symfony\Component\HttpFoundation\Response
   * @Security("has_role('ROLE_USER')")
   */
  public function viewAction(StarShip $starShip)
  {
    return $this->render('@CrockStarShipManager/StarShipManager/view.html.twig', [
      'starship' => $starShip
    ]);
  }

  /**
   * @param Request $request
   * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
   * @Security("has_role('ROLE_USER')")
   */
  public function addAction(Request $request)
  {
    $starShip = new StarShip;

    $form = $this ->createForm(StarShipType::class, $starShip);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this
        ->getDoctrine()
        ->getManager()
      ;

      $em
        ->persist($starShip);

      $em
        ->flush();

      $request
        ->getSession()
        ->getFlashBag()
        ->add('notice', 'Votre nouveau vaisseau a été créé.')
      ;

      return $this->redirectToRoute('crock_star_ship_manager_view', [
        'id' => $starShip->getId()
      ]);
    }

    return $this->render('@CrockStarShipManager/StarShipManager/add.html.twig', [
      'form' => $form->createView()
    ]);
  }

  /**
   * @param Request $request
   * @param $id
   * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
   */
  public function editAction(Request $request, $id)
  {
    $em = $this
      ->getDoctrine()
      ->getManager()
    ;

    $starShip = $em
      ->getRepository('CrockStarShipManagerBundle:StarShip')
      ->find($id)
    ;

    if (null === $starShip) {
      throw new NotFoundHttpException("Le vaisseau avec l'id ".$id." n'existe pas.");
    }

    $form = $this ->createForm(StarShipType::class, $starShip);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
      $em = $this
        ->getDoctrine()
        ->getManager();

      $em
        ->persist($starShip);

      $em
        ->flush();

      $request
        ->getSession()
        ->getFlashBag()
        ->add('notice', 'Votre vaisseau a été modifié.');

      return $this->redirectToRoute('crock_star_ship_manager_view', [
        'id' => $starShip->getId()
      ]);
    }

    return $this->render('@CrockStarShipManager/StarShipManager/edit.html.twig', [
      'starship' => $starShip,
      'form' => $form->createView()
    ]);
  }

  /**
   * @param Request $request
   * @param $id
   * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
   */
  public function deleteAction(Request $request, $id)
  {
    $em = $this->getDoctrine()->getManager();

    $starShip = $em->getRepository('CrockStarShipManagerBundle:StarShip')->find($id);

    if (null === $starShip) {
      throw new NotFoundHttpException("Le vaisseau avec l'id ".$id." n'existe pas.");
    }

    $form = $this->get('form.factory')->create();

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $em->remove($starShip);
      $em->flush();

      $request
        ->getSession()
        ->getFlashBag()
        ->add('notice', 'Votre vaisseau a été supprimé.');

      return $this->redirectToRoute('crock_star_ship_manager_homepage');
    }

    return $this->render('@CrockStarShipManager/StarShipManager/delete.html.twig', [
      'starship' => $starShip,
      'form'     => $form->createView()
    ]);
  }
}