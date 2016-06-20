<?php

namespace MailBoxBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MailBoxBundle\Entity\UserRepository")
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="user")
     */
    private $addresses;

    /**
     * @ORM\OneToMany(targetEntity="Email", mappedBy="user")
     */
    private $emails;

    /**
     * @ORM\OneToMany(targetEntity="Telephone", mappedBy="user")
     */
    private $telephones;

    /**
     * @ORM\ManyToMany(targetEntity="Groups", inversedBy="users")
     * @ORM\JoinTable(name="users_groups")
     */
    private $groups;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
        $this->emails = new ArrayCollection();
        $this->telephones = new ArrayCollection();
        $this->groups = new ArrayCollection();
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Add addresses
     *
     * @param \MailBoxBundle\Entity\Address $addresses
     * @return User
     */
    public function addAddress(\MailBoxBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \MailBoxBundle\Entity\Address $addresses
     */
    public function removeAddress(\MailBoxBundle\Entity\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * Add emails
     *
     * @param \MailBoxBundle\Entity\Email $emails
     * @return User
     */
    public function addEmail(\MailBoxBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \MailBoxBundle\Entity\Email $emails
     */
    public function removeEmail(\MailBoxBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add telephones
     *
     * @param \MailBoxBundle\Entity\Telephone $telephones
     * @return User
     */
    public function addTelephone(\MailBoxBundle\Entity\Telephone $telephones)
    {
        $this->telephones[] = $telephones;

        return $this;
    }

    /**
     * Remove telephones
     *
     * @param \MailBoxBundle\Entity\Telephone $telephones
     */
    public function removeTelephone(\MailBoxBundle\Entity\Telephone $telephones)
    {
        $this->telephones->removeElement($telephones);
    }

    /**
     * Get telephones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTelephones()
    {
        return $this->telephones;
    }

    /**
     * Add groups
     *
     * @param \MailBoxBundle\Entity\Groups $groups
     * @return User
     */
    public function addGroup(\MailBoxBundle\Entity\Groups $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \MailBoxBundle\Entity\Groups $groups
     */
    public function removeGroup(\MailBoxBundle\Entity\Groups $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }
}
