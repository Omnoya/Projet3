<?php

namespace ReceptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soiree
 */
class Soiree
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $descriptif;

    /**
     * @var string
     */
    private $photo;

    /**
     * @var \DateTime
     */
    private $dateInvitation;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Soiree
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set descriptif
     *
     * @param string $descriptif
     * @return Soiree
     */
    public function setDescriptif($descriptif)
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get descriptif
     *
     * @return string 
     */
    public function getDescriptif()
    {
        return $this->descriptif;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Soiree
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set dateInvitation
     *
     * @param \DateTime $dateInvitation
     * @return Soiree
     */
    public function setDateInvitation($dateInvitation)
    {
        $this->dateInvitation = $dateInvitation;

        return $this;
    }

    /**
     * Get dateInvitation
     *
     * @return \DateTime 
     */
    public function getDateInvitation()
    {
        return $this->dateInvitation;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $soiree;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->soiree = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add soiree
     *
     * @param \UserBundle\Entity\User $soiree
     * @return Soiree
     */
    public function addSoiree(\UserBundle\Entity\User $soiree)
    {
        $this->soiree[] = $soiree;

        return $this;
    }

    /**
     * Remove soiree
     *
     * @param \UserBundle\Entity\User $soiree
     */
    public function removeSoiree(\UserBundle\Entity\User $soiree)
    {
        $this->soiree->removeElement($soiree);
    }

    /**
     * Get soiree
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSoiree()
    {
        return $this->soiree;
    }
}
