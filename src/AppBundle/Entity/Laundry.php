<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Laundry
 *
 * @ORM\Table(name="laundry")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LaundryRepository")
 */
class Laundry
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
     * @ORM\Column(name="streetName", type="string", length=255)
     */
    private $streetName;

    /**
     * @var string
     *
     * @ORM\Column(name="streetNumber", type="string", length=20, nullable=true)
     */
    private $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="zipCode", type="string", length=20)
     */
    private $zipCode;

    /**
     * @var string
     *
     * @ORM\Column(name="contactPhone", type="string", length=20, nullable=true)
     */
    private $contactPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=20, nullable=true, unique=false)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=20, nullable=true, unique=false)
     */
    private $longitude;

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
     * Set streetName
     *
     * @param string $streetName
     *
     * @return Laundry
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get streetName
     *
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set streetNumber
     *
     * @param string $streetNumber
     *
     * @return Laundry
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Laundry
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set contactPhone
     *
     * @param string $contactPhone
     *
     * @return Laundry
     */
    public function setContactPhone($contactPhone)
    {
        $this->contactPhone = $contactPhone;

        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Set laundryName
     *
     * @param string $laundryName
     *
     * @return Laundry
     */
    public function setLaundryName($laundryName)
    {
        $this->laundryName = $laundryName;

        return $this;
    }

    /**
     * Get laundryName
     *
     * @return string
     */
    public function getLaundryName()
    {
        return $this->laundryName;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Laundry
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

  /**
   * Set lattitude
   *
   * @param string $lattitude
   *
   * @return Laundry
   */
  public function setLattitude($lattitude)
  {
    $this->lattitude = $lattitude;

    return $this;
  }

  /**
   * Get lattitude
   *
   * @return string
   */
  public function getLattitude()
  {
    return $this->lattitude;
  }
}
