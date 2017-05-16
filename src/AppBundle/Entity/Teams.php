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
     * Many Teams have Many Members
     * @ORM\ManyToMany(targetEntity="Users", inversedBy="teams")
     * @ORM\JoinTable(name="Users_Teams")
     *
     */
    private $members;



    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add members
     *
     * @param \AppBundle\Entity\Users $members
     *
     * @return Teams
     */
    public function addMember(\AppBundle\Entity\Users $members)
    {
        $this->members[] = $members;

        return $this;
    }

    /**
     * Remove members
     *
     * @param \AppBundle\Entity\UsersTeams $members
     */
    public function removeMember(\AppBundle\Entity\Users $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembers()
    {
        return $this->members;
    }
}
