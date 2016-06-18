<?php

namespace MailBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MailBoxBundle\Entity\AddressRepository")
 */
class Address
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=100)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="houseNumber", type="string", length=20)
     */
    private $houseNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="apartamentNumber", type="string", length=20)
     */
    private $apartamentNumber;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="addresses")
     */
    private $user;


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
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get houseNumber
     *
     * @return string
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set houseNumber
     *
     * @param string $houseNumber
     * @return Address
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get apartamentNumber
     *
     * @return string
     */
    public function getApartamentNumber()
    {
        return $this->apartamentNumber;
    }

    /**
     * Set apartamentNumber
     *
     * @param string $apartamentNumber
     * @return Address
     */
    public function setApartamentNumber($apartamentNumber)
    {
        $this->apartamentNumber = $apartamentNumber;

        return $this;
    }

    /**
     * Get user
     *
     * @return \MailBoxBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param \MailBoxBundle\Entity\User $user
     * @return Address
     */
    public function setUser(\MailBoxBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
}
