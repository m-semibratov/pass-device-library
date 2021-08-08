<?php

namespace App\Entity;

use App\Repository\AppleCardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppleCardRepository::class)
 * @ORM\Table(name="apple_card", 
 * uniqueConstraints={
 *     @ORM\UniqueConstraint(name="apple_card_apple_card_id_idx", columns={"apple_card_id"}),
 *     @ORM\UniqueConstraint(name="apple_card_device_library_identifier_idx", columns={"device_library_identifier"}),
 *     @ORM\UniqueConstraint(name="apple_card_push_token_idx", columns={"push_token"}),
 *     @ORM\UniqueConstraint(name="apple_card_serial_number_pass_type_id_idx", columns={"serial_number", "pass_type_id"})
 * }, 
 * indexes={
 *     @ORM\Index(name="apple_card_created_at_idx", columns={"created_at"}),
 *     @ORM\Index(name="apple_card_last_updated_at_idx", columns={"last_updated_at"}),
 *     @ORM\Index(name="apple_card_pass_type_id_idx", columns={"pass_type_id"})
 * })
 */
class AppleCard
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
    private $appleCardId;

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
     * @ORM\Column(type="string", length=32)
     */
    private $deviceLibraryIdentifier;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $passTypeId;

    /**
     * @ORM\Column(type="string", length=36)
     */
    private $pushToken;

    /**
     * @ORM\ManyToMany(targetEntity=Device::class, inversedBy="appleCards")
     */
    private $devices;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $serialNumber;

    public function __construct()
    {
        $this->devices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppleCardId(): ?string
    {
        return $this->appleCardId;
    }

    public function setAppleCardId(string $appleCardId): self
    {
        $this->appleCardId = $appleCardId;

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

    public function getDeviceLibraryIdentifier(): ?string
    {
        return $this->deviceLibraryIdentifier;
    }

    public function setDeviceLibraryIdentifier(string $deviceLibraryIdentifier): self
    {
        $this->deviceLibraryIdentifier = $deviceLibraryIdentifier;

        return $this;
    }

    public function getPassTypeId(): ?string
    {
        return $this->passTypeId;
    }

    public function setPassTypeId(string $passTypeId): self
    {
        $this->passTypeId = $passTypeId;

        return $this;
    }

    public function getPushToken(): ?string
    {
        return $this->pushToken;
    }

    public function setPushToken(string $pushToken): self
    {
        $this->pushToken = $pushToken;

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

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }
}
