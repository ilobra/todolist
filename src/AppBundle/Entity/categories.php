<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\categoriesRepository")
 */
class categories
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
     * @ORM\Column(name="categoryname", type="string", length=255, unique=true)
     */
    private $categoryname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * One category has Many tasks.
     * @ORM\OneToMany(targetEntity="task", mappedBy="category")
     */
    private $tasks;

    public function __construct()
    {
        $this->tasks=new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTasks()
    {
        return $this->tasks;
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
     * Set categoryname
     *
     * @param string $categoryname
     *
     * @return categories
     */
    public function setCategoryname($categoryname)
    {
        $this->categoryname = $categoryname;

        return $this;
    }

    /**
     * Get categoryname
     *
     * @return string
     */
    public function getCategoryname()
    {
        return $this->categoryname;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return categories
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
}

