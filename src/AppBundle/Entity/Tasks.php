<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tasks
 *
 * @ORM\Table(name="tasks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TasksRepository")
 */
class Tasks
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
     * @ORM\Column(name="taskname", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $taskname;

    /**
     * @var string
     *
     * @ORM\Column(name="taskcomment", type="text", nullable=true)
     *
     */
    private $taskcomment;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     * @Assert\NotBlank()
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueto", type="datetime")
     */
    private $dueto;

    /**
     * Many Tasks have one Status
     *
     * @ORM\ManyToOne(targetEntity="status", inversedBy="statustask")
     *  @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $status;


    /**
     * Many Tasks have One Category.
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="categorytasks")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * Many Tasks have One Author
     * @ORM\ManyToOne(targetEntity="Users", inversedBy="usertasks")
     * @ORM\JoinColumn(name="authorUser_id", referencedColumnName="id")
     */
    private $author;

    /**
     * Many Tasks have One Priority
     * @ORM\ManyToOne(targetEntity="Priorities", inversedBy="prioritytask")
     * @ORM\JoinColumn(name="priority_id", referencedColumnName="id")
     */
    private $priority;

    /**
     * Many Tasks have One Team
     * @ORM\ManyToOne(targetEntity="Teams", inversedBy="teamtasks")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    private $team;

    public function __construct()
    {
        $this->created = new \DateTime();
        $this->dueto=new \DateTime();
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
     * Set taskname
     *
     * @param string $taskname
     *
     * @return Tasks
     */
    public function setTaskname($taskname)
    {
        $this->taskname = $taskname;

        return $this;
    }

    /**
     * Get taskname
     *
     * @return string
     */
    public function getTaskname()
    {
        return $this->taskname;
    }

    /**
     * Set taskcomment
     *
     * @param string $taskcomment
     *
     * @return Tasks
     */
    public function setTaskcomment($taskcomment)
    {
        $this->taskcomment = $taskcomment;

        return $this;
    }

    /**
     * Get taskcomment
     *
     * @return string
     */
    public function getTaskcomment()
    {
        return $this->taskcomment;
    }


    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Tasks
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set dueto
     *
     * @param \DateTime $dueto
     *
     * @return Tasks
     */
    public function setDueto($dueto)
    {
        $this->dueto = $dueto;

        return $this;
    }

    /**
     * Get dueto
     *
     * @return \DateTime
     */
    public function getDueto()
    {
        return $this->dueto;
    }



    /**
     * Set category
     *
     * @param \AppBundle\Entity\Categories $category
     *
     * @return Tasks
     */
    public function setCategory(\AppBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param \AppBundle\Entity\Users $author
     *
     * @return Tasks
     */
    public function setAuthor(\AppBundle\Entity\Users $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\Users
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param mixed $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Tasks
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }



    /**
     * Set team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Tasks
     */
    public function setTeam(\AppBundle\Entity\Teams $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \AppBundle\Entity\Teams
     */
    public function getTeam()
    {
        return $this->team;
    }
}

