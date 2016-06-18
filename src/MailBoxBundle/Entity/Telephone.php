<?php

namespace MailBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telephone
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MailBoxBundle\Entity\TelephoneRepository")
 */
class Telephone
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
     * @ORM\Column(name="telNumber", type="string", length=255)
     */
    private $telNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=60)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="telephones")
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
     * Get telNumber
     *
     * @return string
     */
    public function getTelNumber()
    {
        return $this->telNumber;
    }

    /**
     * Set telNumber
     *
     * @param string $telNumber
     * @return Telephone
     */
    public function setTelNumber($telNumber)
    {
        $this->telNumber = $telNumber;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Telephone
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * @return Telephone
     */
    public function setUser(\MailBoxBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
}
