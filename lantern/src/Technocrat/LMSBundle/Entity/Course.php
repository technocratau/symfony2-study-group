<?php

namespace Technocrat\LMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Course
 */
class Course
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $cover;

    /**
     * @var ArrayCollection
     */
    private $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add units
     *
     * @param \Technocrat\LMSBundle\Entity\Unit $units
     * @return Course
     */
    public function addUnit(\Technocrat\LMSBundle\Entity\Unit $units)
    {
        $this->units[] = $units;

        return $this;
    }

    /**
     * Remove units
     *
     * @param \Technocrat\LMSBundle\Entity\Unit $units
     */
    public function removeUnit(\Technocrat\LMSBundle\Entity\Unit $units)
    {
        $this->units->removeElement($units);
    }

    /**
     * Get units
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return Course
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Render unit as a string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get web path to upload directory
     *
     * @return string
     *  Relative path
     */
    protected function getUploadPath()
    {
        return 'uploads/course/covers';
    }

    /**
     * Get absolute path to upload directory
     *
     * @return string
     *  Absolute path
     */
    protected function getUploadAbsolutePath()
    {
        return __DIR__ . '/../../../../web/' . $this->getUploadPath();
    }

    /**
     * Get web path to a cover.
     *
     * @return null|string
     *  Relative path.
     */
    public function getCoverWeb()
    {
        return NULL === $this->getCover()
            ? NULL
            : $this->getUploadPath() . '/' . $this->getCover();
    }

    /**
     * Get path on disk to a cover.
     *
     * @return null|string
     *  Relative path.
     */
    public function getCoverAbsolute()
    {
        return NULL === $this->getCover()
            ? NULL
            : $this->getUploadAbsolutePath() . '/' . $this->getCover();
    }

    /**
     * @var UploadedFile
     */
    private $file;

    /**
     * Get file
     *
     * @return UploadedFile 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @return Unit
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * Upload the cover file.
     */
    public function upload()
    {
        // File property can be empty.
        if (NULL === $this->getFile()) {
            return;
        }

        $filename = $this->getFile()->getClientOriginalName();

        // Move uploaded file to a target directory.
        $this->getFile()->move(
            $this->getUploadAbsolutePath(),
            $filename);

        // Set the cover.
        $this->setCover($filename);

        $this->setFile(NULL);
    }
}
