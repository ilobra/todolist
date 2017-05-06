<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Members
 *
 * @ORM\Table(name="members")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembersRepository")
 */
class Members
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
     * One member has One User
     * @ORM\OneToOne(targetEntity="Users")
     * @ORM\JoinColumn(name="registeredAs", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="Teams")
     * @ORM\JoinTable(name="members_teams",
     *     joinColumns={@ORM\JoinColumn(name="member_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="team_id",referencedColumnName="id")}
     *     )
     */
    private $teams;

    /**
     * One Member has Many Tasks
     * @ORM\OneToMany(targetEntity="Tasks", mappedBy="author")
     *
     *
     */
    private $membertasks;

    public function __construct()
    {
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
        $this->membertasks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Members
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
     * Add team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Members
     */
    public function addTeam(\AppBundle\Entity\Teams $team)
    {
        $this->teams[] = $team;

        return $this;
    }

    /**
     * Remove team
     *
     * @param \AppBundle\Entity\Teams $team
     */
    public function removeTeam(\AppBundle\Entity\Teams $team)
    {
        $this->teams->removeElement($team);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add membertask
     *
     * @param \AppBundle\Entity\Tasks $membertask
     *
     * @return Members
     */
    public function addMembertask(\AppBundle\Entity\Tasks $membertask)
    {
        $this->membertasks[] = $membertask;

        return $this;
    }

    /**
     * Remove membertask
     *
     * @param \AppBundle\Entity\Tasks $membertask
     */
    public function removeMembertask(\AppBundle\Entity\Tasks $membertask)
    {
        $this->membertasks->removeElement($membertask);
    }

    /**
     * Get membertasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembertasks()
    {
        return $this->membertasks;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Members
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return $this->name;
    }
}
