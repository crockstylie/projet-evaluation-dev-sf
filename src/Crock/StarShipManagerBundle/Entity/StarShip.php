<?php

namespace Crock\StarShipManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StarShip
 *
 * @ORM\Table(name="star_ship")
 * @ORM\Entity(repositoryClass="Crock\StarShipManagerBundle\Repository\StarShipRepository")
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
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="longueur", type="decimal", precision=6, scale=2)
     */
    private $longueur;

    /**
     * @var int
     *
     * @ORM\Column(name="vitesse_max", type="smallint")
     */
    private $vitesseMax;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_personnels_navigants", type="integer")
     */
    private $nbPersonnelsNavigants;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_passagers", type="integer")
     */
    private $nbPassagers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modification", type="datetime")
     */
    private $dateModification;

    public function __construct()
    {
      $this->dateCreation     = new \DateTime();
      $this->dateModification = new \DateTime();
    }

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
}
