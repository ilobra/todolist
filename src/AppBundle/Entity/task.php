<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\taskRepository")
 */
class task
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
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;


    /**
     * @var string
     *
     * @ORM\Column(name="taskname", type="string", length=255)
     */
    private $taskname;

    /**
     * @var string
     *
     * @ORM\Column(name="taskcomment", type="text")
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
     * @ORM\Column(name="taskcreated", type="datetime")
     */
    private $taskcreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="taskdueto", type="datetime")
     */
    private $taskdueto;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * Many tasks have One category
     * @ORM\ManyToOne(targetEntity="categories", inversedBy="tasks")
     *
     */
    private $category;

    public function getCategory()
    {
        return $this->category;
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
     * Set author
     *
     * @param string $author
     *
     * @return task
     */
    public function setauthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getauthor()
    {
        return $this->author;
    }

    /**
     * Set taskname
     *
     * @param string $taskname
     *
     * @return task
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
     * @return task
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
     * @return task
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
     * Set taskcreated
     *
     * @param \DateTime $taskcreated
     *
     * @return task
     */
    public function setTaskcreated($taskcreated)
    {
        $this->taskcreated = $taskcreated;

        return $this;
    }

    /**
     * Get taskcreated
     *
     * @return \DateTime
     */
    public function getTaskcreated()
    {
        return $this->taskcreated;
    }

    /**
     * Set taskdueto
     *
     * @param \DateTime $taskdueto
     *
     * @return task
     */
    public function setTaskdueto($taskdueto)
    {
        $this->taskdueto = $taskdueto;

        return $this;
    }

    /**
     * Get taskdueto
     *
     * @return \DateTime
     */
    public function getTaskdueto()
    {
        return $this->taskdueto;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return task
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
}

