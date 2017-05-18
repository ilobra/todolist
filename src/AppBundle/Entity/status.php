<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * status
 *
 * @ORM\Table(name="status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\statusRepository")
 */
class status
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
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * One Priority has Many Tasks.
     * @ORM\OneToMany(targetEntity="status", mappedBy="string")
     */
    private $statustask;

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
     * Add statustask
     *
     * @param \AppBundle\Entity\Tasks $statustask
     *
     * @return Status
     */
    public function addStatustask(\AppBundle\Entity\Tasks $statustask)
    {
        $this->statustask[] = $statustask;

        return $this;
    }

    /**
     * Set string
     *
     * @param string $status
     *
     * @return status
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get string
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    public function removeStatustask(\AppBundle\Entity\Tasks $statustask)
    {
        $this->statustask->removeElement($statustask);
    }


    public function getStatustask()
    {
        return $this->statustask;
    }
    public function __toString()
    {
        return $this->status;
    }

}

