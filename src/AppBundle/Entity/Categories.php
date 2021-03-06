<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriesRepository")
 */
class Categories
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
     * @ORM\Column(name="categoryname", type="string", length=100)
     */
    private $categoryname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
    * Many Categories have One Team
    * @ORM\ManyToOne(targetEntity="Teams", inversedBy="teamcategories")
    * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
    */
    private $team;

    /**
     * One Category has Many Tasks.
     * @ORM\OneToMany(targetEntity="Tasks", mappedBy="category")
     */
    private $categorytasks;

    public function __construct()
    {
        $this->categorytasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->created=new \DateTime();
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
     * @return Categories
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
     * @return Categories
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
     * Add categorytask
     *
     * @param \AppBundle\Entity\Tasks $categorytask
     *
     * @return Categories
     */
    public function addCategorytask(\AppBundle\Entity\Tasks $categorytask)
    {
        $this->categorytasks[] = $categorytask;

        return $this;
    }

    /**
     * Remove categorytask
     *
     * @param \AppBundle\Entity\Tasks $categorytask
     */
    public function removeCategorytask(\AppBundle\Entity\Tasks $categorytask)
    {
        $this->categorytasks->removeElement($categorytask);
    }

    /**
     * Get categorytasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorytasks()
    {
        return $this->categorytasks;
    }

    public function __toString()
    {
        return $this->categoryname;
    }

    /**
     * Set team
     *
     * @param \AppBundle\Entity\Teams $team
     *
     * @return Categories
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
