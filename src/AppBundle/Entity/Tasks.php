<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="taskname", type="string", length=255)
     */
    private $taskname;

    /**
     * @var string
     *
     * @ORM\Column(name="taskcomment", type="text", nullable=true)
     */
    private $taskcomment;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=255)
     */
    private $priority;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueto", type="datetime")
     */
    private $dueto;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


    /**
     * Many Tasks have One Category.
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="categorytasks")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;

    /**
     * Many Tasks have One Author
     * @ORM\ManyToOne(targetEntity="Members", inversedBy="membertasks")
     * @ORM\JoinColumn(name="author", referencedColumnName="id")
     */
    private $author;

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
     * Set priority
     *
     * @param string $priority
     *
     * @return Tasks
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
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
     * Set status
     *
     * @param string $status
     *
     * @return Tasks
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
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
     * @param \AppBundle\Entity\Members $author
     *
     * @return Tasks
     */
    public function setAuthor(\AppBundle\Entity\Members $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\Members
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
