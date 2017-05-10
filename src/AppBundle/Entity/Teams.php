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
     * @ORM\Column(name="teamname", type="string", length=255, nullable=false)
     *
     */
    private $teamname;

    /**
     * One Team has Many UsersTeams
     * @ORM\OneToMany(targetEntity="UsersTeams", mappedBy="team")
     */
    private $usersteamsTeam;


    public function __construct()
    {
        $this->usersteamsTeam = new \Doctrine\Common\Collections\ArrayCollection();
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
}
