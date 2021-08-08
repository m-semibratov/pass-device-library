<?php

namespace App\Entity;

use App\Repository\DeviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeviceRepository::class)
 * @ORM\Table(name="device", 
 * uniqueConstraints={
 *     @ORM\UniqueConstraint(name="device_device_id_idx", columns={"device_id"})
 * }, 
 * indexes={
 *     @ORM\Index(name="device_created_at_idx", columns={"created_at"}),
 *     @ORM\Index(name="device_last_updated_at_idx", columns={"last_updated_at"}),
 * })
 */
class Device
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=36)
     */
    private $deviceId;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastUpdatedAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $osType;

    /**
     * @ORM\ManyToMany(targetEntity=AppleCard::class, mappedBy="devices")
     */
    private $appleCards;

    /**
     * @ORM\ManyToMany(targetEntity=GoogleCard::class, mappedBy="devices")
     */
    private $googleCards;

    public function __construct()
    {
        $this->appleCards = new ArrayCollection();
        $this->googleCards = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    public function setDeviceId(string $deviceId): self
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastUpdatedAt(): ?\DateTimeInterface
    {
        return $this->lastUpdatedAt;
    }

    public function setLastUpdatedAt(\DateTimeInterface $lastUpdatedAt): self
    {
        $this->lastUpdatedAt = $lastUpdatedAt;

        return $this;
    }

    public function getOsType(): ?int
    {
        return $this->osType;
    }

    public function setOsType(int $osType): self
    {
        $this->osType = $osType;

        return $this;
    }

    /**
     * @return Collection|AppleCard[]
     */
    public function getAppleCards(): Collection
    {
        return $this->appleCards;
    }

    public function addAppleCard(AppleCard $appleCard): self
    {
        if (!$this->appleCards->contains($appleCard)) {
            $this->appleCards[] = $appleCard;
            $appleCard->addDevice($this);
        }

        return $this;
    }

    public function removeAppleCard(AppleCard $appleCard): self
    {
        if ($this->appleCards->removeElement($appleCard)) {
            $appleCard->removeDevice($this);
        }

        return $this;
    }

    /**
     * @return Collection|GoogleCard[]
     */
    public function getGoogleCards(): Collection
    {
        return $this->googleCards;
    }

    public function addGoogleCard(GoogleCard $googleCard): self
    {
        if (!$this->googleCards->contains($googleCard)) {
            $this->googleCards[] = $googleCard;
            $googleCard->addDevice($this);
        }

        return $this;
    }

    public function removeGoogleCard(GoogleCard $googleCard): self
    {
        if ($this->googleCards->removeElement($googleCard)) {
            $googleCard->removeDevice($this);
        }

        return $this;
    }
}
