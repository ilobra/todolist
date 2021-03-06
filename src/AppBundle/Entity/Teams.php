<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Teams
 *
 * @ORM\Table(name="teams")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamsRepository")
 */
class Teams
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
     * @ORM\Column(name="teamname", type="string", length=255, nullable=false, unique=true)
     *
     */
    private $teamname;

    /**
     * One Team has Many UsersTeams
     * @ORM\OneToMany(targetEntity="UsersTeams", mappedBy="team")
     */
    private $usersteamsTeam;

    /**
     * One Team has Many Tasks
     * @ORM\OneToMany(targetEntity="Tasks", mappedBy="team")
     */
    private $teamtasks;

    /**
     * One Team has Many Categories
     * @ORM\OneToMany(targetEntity="Categories", mappedBy="team")
     */
    private $teamcategories;


    public function __construct()
    {
        $this->usersteamsTeam = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teamtasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teamcategories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set teamname
     *
     * @param string $teamname
     *
     * @return Teams
     */
    public function setTeamname($teamname)
    {
        $this->teamname = $teamname;

        return $this;
    }

    /**
     * Get teamname
     *
     * @return string
     */
    public function getTeamname()
    {
        return $this->teamname;
    }

    public function __toString()
    {
        return $this->teamname;
    }

    /**
     * Add usersteamsTeam
     *
     * @param \AppBundle\Entity\UsersTeams $usersteamsTeam
     *
     * @return Teams
     */
    public function addUsersteamsTeam(\AppBundle\Entity\UsersTeams $usersteamsTeam)
    {
        $this->usersteamsTeam[] = $usersteamsTeam;

        return $this;
    }

    /**
     * Remove usersteamsTeam
     *
     * @param \AppBundle\Entity\UsersTeams $usersteamsTeam
     */
    public function removeUsersteamsTeam(\AppBundle\Entity\UsersTeams $usersteamsTeam)
    {
        $this->usersteamsTeam->removeElement($usersteamsTeam);
    }

    /**
     * Get usersteamsTeam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsersteamsTeam()
    {
        return $this->usersteamsTeam;
    }



    /**
     * Add teamtask
     *
     * @param \AppBundle\Entity\Tasks $teamtask
     *
     * @return Teams
     */
    public function addTeamtask(\AppBundle\Entity\Tasks $teamtask)
    {
        $this->teamtasks[] = $teamtask;

        return $this;
    }

    /**
     * Remove teamtask
     *
     * @param \AppBundle\Entity\Tasks $teamtask
     */
    public function removeTeamtask(\AppBundle\Entity\Tasks $teamtask)
    {
        $this->teamtasks->removeElement($teamtask);
    }

    /**
     * Get teamtasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeamtasks()
    {
        return $this->teamtasks;
    }

    /**
     * Add teamcategory
     *
     * @param \AppBundle\Entity\Categories $teamcategory
     *
     * @return Teams
     */
    public function addTeamcategory(\AppBundle\Entity\Categories $teamcategory)
    {
        $this->teamcategories[] = $teamcategory;

        return $this;
    }

    /**
     * Remove teamcategory
     *
     * @param \AppBundle\Entity\Categories $teamcategory
     */
    public function removeTeamcategory(\AppBundle\Entity\Categories $teamcategory)
    {
        $this->teamcategories->removeElement($teamcategory);
    }

    /**
     * Get teamcategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeamcategories()
    {
        return $this->teamcategories;
    }
}
