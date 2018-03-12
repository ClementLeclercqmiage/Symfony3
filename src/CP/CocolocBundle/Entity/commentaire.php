<?php

namespace CP\CocolocBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity(repositoryClass="CP\CocolocBundle\Repository\commentaireRepository")
 */
class commentaire
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
     * @var int
     *
     * @ORM\Column(name="auteurId", type="integer")
     */
    private $auteurId;

    /**
     * @var int
     *
     * @ORM\Column(name="annonceId", type="integer")
     */
    private $annonceId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string
     *
     * @ORM\Column(name="auteurName", type="string", length=255)
     */
    private $auteurName;

        /**
    *@ORM\ManyToOne(targetEntity="Annonce", inversedBy="commentaires", cascade={"persist"})
    *@ORM\JoinColumn(nullable=true,onDelete="CASCADE")
    */

    private $annonce;


    public function __construct(){
        $this->date = new \Datetime();
    }

    public function getAnnonce(){
        return $this->annonce;
    }

    public function setAnnonce($annonce){
        $this->annonce = $annonce;
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
     * Set auteurId
     *
     * @param integer $auteurId
     *
     * @return commentaire
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
     * Set annonceId
     *
     * @param integer $annonceId
     *
     * @return commentaire
     */
    public function setAnnonceId($annonceId)
    {
        $this->annonceId = $annonceId;

        return $this;
    }

    /**
     * Get annonceId
     *
     * @return int
     */
    public function getAnnonceId()
    {
        return $this->annonceId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return commentaire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return commentaire
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
     * @return commentaire
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
     * Set auteurName
     *
     * @param string $auteurName
     *
     * @return commentaire
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
}

