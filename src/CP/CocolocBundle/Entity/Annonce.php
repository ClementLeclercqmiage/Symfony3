<?php

namespace CP\CocolocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="CP\CocolocBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datepublication", type="datetime")
     */
    private $datepublication;

    /**
     * @var int
     *
     * @ORM\Column(name="auteurId", type="integer")
     */
    private $auteurId;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurName", type="string", length=255)
     */
    private $auteurName;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbplace", type="integer")
     */
    private $nbplace;

    /**
    *@ORM\OneToMany(targetEntity="commentaire", mappedBy="annonce")
    */

    private $commentaires;



    public function __construct(){
        $this->commentaires = new ArrayCollection();
        $this->datepublication = new \Datetime();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Annonce
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set datepublication
     *
     * @param \DateTime $datepublication
     *
     * @return Annonce
     */
    public function setDatepublication($datepublication)
    {
        $this->datepublication = $datepublication;

        return $this;
    }

    /**
     * Get datepublication
     *
     * @return \DateTime
     */
    public function getDatepublication()
    {
        return $this->datepublication;
    }

    /**
     * Set auteurId
     *
     * @param integer $auteurId
     *
     * @return Annonce
     */
    public function setAuteurId($auteurId)
    {
        $this->auteurId = $auteurId;

        return $this;
    }

    /**
     * Get auteurId
     *
     * @return int
     */
    public function getAuteurId()
    {
        return $this->auteurId;
    }

    /**
     * Set auteurName
     *
     * @param string $auteurName
     *
     * @return Annonce
     */
    public function setAuteurName($auteurName)
    {
        $this->auteurName = $auteurName;

        return $this;
    }

    /**
     * Get auteurName
     *
     * @return string
     */
    public function getAuteurName()
    {
        return $this->auteurName;
    }

  /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }


    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Annonce
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Annonce
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Annonce
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set nbplace
     *
     * @param integer $nbplace
     *
     * @return Annonce
     */
    public function setNbplace($nbplace)
    {
        $this->nbplace = $nbplace;

        return $this;
    }

    /**
     * Get nbplace
     *
     * @return int
     */
    public function getNbplace()
    {
        return $this->nbplace;
    }


        public function getCommentaires(){
        return $this->commentaires;
    }

    public function addCommentaires(commentaire $commentaire){
        $this->commentaires [] = $commentaire;
    }
}

