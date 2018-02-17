<?php

namespace Crock\StarShipManagerBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StarShipRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StarShipRepository extends EntityRepository
{
  public function getStarShips()
  {
    $query = $this
      ->createQueryBuilder('star_ship')
      ->orderBy('star_ship.dateCreation', 'DESC')
      ->getQuery()
      ->getResult()
    ;

    return $query;
  }
}