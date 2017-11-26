<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kur
 *
 * @ORM\Table(name="kurlar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KurRepository")
 */
class Kur
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="dolar", type="decimal", precision=6, scale=4)
     */
    private $dolar;

    /**
     * @var string
     *
     * @ORM\Column(name="euro", type="decimal", precision=6, scale=4)
     */
    private $euro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;

    function __construct()
    {
        $this->updateAt = new \DateTime();
    }

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
     * Set name
     *
     * @param string $name
     * @return Kur
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dolar
     *
     * @param string $dolar
     * @return Kur
     */
    public function setDolar($dolar)
    {
        $this->dolar = $dolar;

        return $this;
    }

    /**
     * Get dolar
     *
     * @return string 
     */
    public function getDolar()
    {
        return $this->dolar;
    }

    /**
     * Set euro
     *
     * @param string $euro
     * @return Kur
     */
    public function setEuro($euro)
    {
        $this->euro = $euro;

        return $this;
    }

    /**
     * Get euro
     *
     * @return string 
     */
    public function getEuro()
    {
        return $this->euro;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Kur
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }
}
