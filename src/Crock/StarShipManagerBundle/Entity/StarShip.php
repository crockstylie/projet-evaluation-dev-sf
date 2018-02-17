<?php

namespace Crock\StarShipManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * StarShip
 *
 * @ORM\Table(name="star_ship")
 * @ORM\Entity(repositoryClass="Crock\StarShipManagerBundle\Repository\StarShipRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class StarShip
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="nom", type="string", length=255)
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\Type(
   *     type="string",
   *     message="Ce champ doit contenir une chaîne de caractères valide"
   * )
   */
  private $nom;

  /**
   * @var string
   *
   * @ORM\Column(name="modele", type="string", length=255)
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\Type(
   *     type="string",
   *     message="Ce champ doit contenir une chaîne de caractères valide"
   * )
   */
  private $modele;

  /**
   * @var string
   *
   * @ORM\Column(name="longueur", type="decimal", precision=6, scale=2)
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\GreaterThan(
   *   value = 0,
   *   message="Ce champ doit contenir une valeur positive"
   * )
   * @Assert\Type(
   *     type="float",
   *     message="Ce champ doit contenir un nombre à virgule"
   * )
   */
  private $longueur;

  /**
   * @var int
   *
   * @ORM\Column(name="vitesse_max", type="smallint")
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\GreaterThan(
   *   value = 0,
   *   message="Ce champ doit contenir une valeur positive"
   * )
   * @Assert\Type(
   *     type="int",
   *     message="Ce champ doit contenir un nombre entier"
   * )
   */
  private $vitesseMax;

  /**
   * @var int
   *
   * @ORM\Column(name="prix", type="integer")
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\GreaterThan(
   *   value = 0,
   *   message="Ce champ doit contenir une valeur positive"
   * )
   * @Assert\Type(
   *     type="int",
   *     message="Ce champ doit contenir un nombre entier"
   * )
   */
  private $prix;

  /**
   * @var int
   *
   * @ORM\Column(name="nb_personnels_navigants", type="integer")
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\GreaterThan(
   *   value = 0,
   *   message="Ce champ doit contenir une valeur positive"
   * )
   * @Assert\Type(
   *     type="int",
   *     message="Ce champ doit contenir un nombre entier"
   * )
   */
  private $nbPersonnelsNavigants;

  /**
   * @var int
   *
   * @ORM\Column(name="nb_passagers", type="integer")
   * @Assert\NotBlank(message="Ce champ ne peut-être vide")
   * @Assert\GreaterThan(
   *   value = -1,
   *   message="Ce champ doit contenir une valeur nulle ou positive"
   * )
   * @Assert\Type(
   *     type="int",
   *     message="Ce champ doit contenir un nombre entier"
   * )
   */
  private $nbPassagers;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="date_creation", type="datetime")
   * @Assert\DateTime(message="Ce champ doit-être au format DateTime")
   */
  private $dateCreation;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="date_modification", type="datetime", nullable=true)
   */
  private $dateModification;


  /**
   * Get id.
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set nom.
   *
   * @param string $nom
   *
   * @return StarShip
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * Get nom.
   *
   * @return string
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set modele.
   *
   * @param string $modele
   *
   * @return StarShip
   */
  public function setModele($modele)
  {
    $this->modele = $modele;

    return $this;
  }

  /**
   * Get modele.
   *
   * @return string
   */
  public function getModele()
  {
    return $this->modele;
  }

  /**
   * Set longueur.
   *
   * @param string $longueur
   *
   * @return StarShip
   */
  public function setLongueur($longueur)
  {
    $this->longueur = $longueur;

    return $this;
  }

  /**
   * Get longueur.
   *
   * @return string
   */
  public function getLongueur()
  {
    return $this->longueur;
  }

  /**
   * Set vitesseMax.
   *
   * @param int $vitesseMax
   *
   * @return StarShip
   */
  public function setVitesseMax($vitesseMax)
  {
    $this->vitesseMax = $vitesseMax;

    return $this;
  }

  /**
   * Get vitesseMax.
   *
   * @return int
   */
  public function getVitesseMax()
  {
    return $this->vitesseMax;
  }

  /**
   * Set prix.
   *
   * @param int $prix
   *
   * @return StarShip
   */
  public function setPrix($prix)
  {
    $this->prix = $prix;

    return $this;
  }

  /**
   * Get prix.
   *
   * @return int
   */
  public function getPrix()
  {
    return $this->prix;
  }

  /**
   * Set nbPersonnelsNavigants.
   *
   * @param int $nbPersonnelsNavigants
   *
   * @return StarShip
   */
  public function setNbPersonnelsNavigants($nbPersonnelsNavigants)
  {
    $this->nbPersonnelsNavigants = $nbPersonnelsNavigants;

    return $this;
  }

  /**
   * Get nbPersonnelsNavigants.
   *
   * @return int
   */
  public function getNbPersonnelsNavigants()
  {
    return $this->nbPersonnelsNavigants;
  }

  /**
   * Set nbPassagers.
   *
   * @param int $nbPassagers
   *
   * @return StarShip
   */
  public function setNbPassagers($nbPassagers)
  {
    $this->nbPassagers = $nbPassagers;

    return $this;
  }

  /**
   * Get nbPassagers.
   *
   * @return int
   */
  public function getNbPassagers()
  {
    return $this->nbPassagers;
  }

  /**
   * Set dateCreation.
   *
   * @param \DateTime $dateCreation
   *
   * @return StarShip
   */
  public function setDateCreation($dateCreation)
  {
    $this->dateCreation = $dateCreation;

    return $this;
  }

  /**
   * Get dateCreation.
   *
   * @return \DateTime
   */
  public function getDateCreation()
  {
    return $this->dateCreation;
  }

  /**
   * Set dateModification.
   *
   * @param \DateTime $dateModification
   *
   * @return StarShip
   */
  public function setDateModification($dateModification)
  {
    $this->dateModification = $dateModification;

    return $this;
  }

  /**
   * Get dateModification.
   *
   * @return \DateTime
   */
  public function getDateModification()
  {
    return $this->dateModification;
  }

  /**
   * @ORM\PrePersist
   */
  public function createDate()
  {
    $this->setDateCreation(new \DateTime());
  }

  /**
   * @ORM\PreUpdate
   */
  public function updateDate()
  {
    $this->setDateModification(new \DateTime());
  }

  /**
   * @param ExecutionContextInterface $context
   * @assert\Callback
   */
  public function isPassengerNumberNotTenTimesMoreThanCrew(ExecutionContextInterface $context)
  {
    $nbPersonnelsNavigants = $this->getNbPersonnelsNavigants();
    $nbPassagers = $this->getNbPassagers();

    if ($nbPassagers > 10 * $nbPersonnelsNavigants) {
      $context
        ->buildViolation('Le nombre de passagers ne doit pas être plus de 10 fois supérieur au nombre de personnels navigants')
        ->atPath('nbPassagers')
        ->addViolation()
      ;
    }
  }
}
