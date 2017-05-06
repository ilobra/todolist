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
     * @ORM\Column(name="teamname", type="string", length=255, unique=true)
     */
    private $teamname;


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
}
