<?php

namespace App\Entity;

use App\Repository\GoogleCardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GoogleCardRepository::class)
 * @ORM\Table(name="google_card", 
 * uniqueConstraints={
 *     @ORM\UniqueConstraint(name="google_card_google_card_id_idx", columns={"google_card_id"}),
 *     @ORM\UniqueConstraint(name="google_card_object_id_idx", columns={"object_id"}),
 * }, 
 * indexes={
 *     @ORM\Index(name="google_card_created_at_idx", columns={"created_at"}),
 *     @ORM\Index(name="google_card_last_updated_at_idx", columns={"last_updated_at"}),
 * })
 */
class GoogleCard
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
    private $googleCardId;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $serialNumber;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastUpdatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $data;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $objectId;

    /**
     * @ORM\ManyToMany(targetEntity=Device::class, inversedBy="googleCards")
     */
    private $devices;

    public function __construct()
    {
        $this->devices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGoogleCardId(): ?string
    {
        return $this->googleCardId;
    }

    public function setGoogleCardId(string $googleCardId): self
    {
        $this->googleCardId = $googleCardId;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;

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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): self
    {
        $this->objectId = $objectId;

        return $this;
    }

    /**
     * @return Collection|Device[]
     */
    public function getDevices(): Collection
    {
        return $this->devices;
    }

    public function addDevice(Device $device): self
    {
        if (!$this->devices->contains($device)) {
            $this->devices[] = $device;
        }

        return $this;
    }

    public function removeDevice(Device $device): self
    {
        $this->devices->removeElement($device);

        return $this;
    }
}
