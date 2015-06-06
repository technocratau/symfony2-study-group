<?php

namespace Technocrat\LMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Unit
 */
class Unit
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $date_starts;

    /**
     * @var Course
     */
    private $course;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Unit
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Unit
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set date_starts
     *
     * @param \DateTime $dateStarts
     * @return Unit
     */
    public function setDateStarts($dateStarts)
    {
        $this->date_starts = $dateStarts;

        return $this;
    }

    /**
     * Get date_starts
     *
     * @return \DateTime 
     */
    public function getDateStarts()
    {
        return $this->date_starts;
    }

    /**
     * Set course
     *
     * @param \Technocrat\LMSBundle\Entity\Course $course
     * @return Unit
     */
    public function setCourse(\Technocrat\LMSBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \Technocrat\LMSBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
