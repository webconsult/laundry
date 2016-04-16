<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * MachineType
 *
 * @ORM\Table(name="machine_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MachineTypeRepository")
 */
class MachineType
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
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Machine", mappedBy="type")
    */
    private $machines;

    public function __construct()
    {
      $this->machines = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=20, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


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
     * Set title
     *
     * @param string $title
     *
     * @return MachineType
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
     * Set description
     *
     * @param string $description
     *
     * @return MachineType
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add machine
     *
     * @param \AppBundle\Entity\Machine $machine
     *
     * @return MachineType
     */
    public function addMachine(\AppBundle\Entity\Machine $machine)
    {
        $this->machines[] = $machine;

        return $this;
    }

    /**
     * Remove machine
     *
     * @param \AppBundle\Entity\Machine $machine
     */
    public function removeMachine(\AppBundle\Entity\Machine $machine)
    {
        $this->machines->removeElement($machine);
    }

    /**
     * Get machines
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMachines()
    {
        return $this->machines;
    }
}
