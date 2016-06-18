<?php

namespace MailBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Email
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MailBoxBundle\Entity\EmailRepository")
 */
class Email
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
     * @ORM\Column(name="emailAddress", type="string", length=255)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="emailType", type="string", length=60)
     */
    private $emailType;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="emails")
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
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Email
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailType
     *
     * @return string
     */
    public function getEmailType()
    {
        return $this->emailType;
    }

    /**
     * Set emailType
     *
     * @param string $emailType
     * @return Email
     */
    public function setEmailType($emailType)
    {
        $this->emailType = $emailType;

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
     * @return Email
     */
    public function setUser(\MailBoxBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
}
