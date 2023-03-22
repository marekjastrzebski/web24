<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use App\Repository\CompaniesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity()]
#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new Patch(),
        new Delete(),
    ]
)]
class Companies
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private ?int $id = null;

	#[ORM\Column(length: 255)]
    #[Assert\NotBlank]
	private ?string $companyName = null;

	#[ORM\Column(length: 255)]
	#[Assert\NotBlank]
	#[Assert\Length(
		min: 10,
		max: 10,
		minMessage: 'nip is to short',
		maxMessage: 'nip is to long'
	)]
	#[Assert\Type(type: 'numeric', message: 'nip should be numeric')]
	private ?string $nip = null;

	#[ORM\Column(length: 255)]
	#[Assert\NotBlank]
	private ?string $street = null;

	#[ORM\Column(length: 255)]
	#[Assert\NotBlank]
	private ?string $city = null;

	#[ORM\Column]
	#[Assert\NotBlank]
	private ?int $buildingNumber = null;

	#[ORM\Column(length: 255, nullable: true)]
	private ?string $flatNumber = null;

	#[ORM\Column(length: 6)]
	#[Assert\NotBlank]
	#[Assert\Length(
		min: 6,
		max: 6,
		minMessage: 'zipCode is to short',
		maxMessage: 'zipCode is to long'
	)]
	private ?string $zipCode = null;



	public function getId(): ?int
	{
		return $this->id;
	}

	public function getCompanyName(): ?string
	{
		return $this->companyName;
	}

	public function setCompanyName(string $companyName): self
	{
		$this->companyName = $companyName;

		return $this;
	}

	public function getNip(): ?string
	{
		return $this->nip;
	}

	public function setNip(string $nip): self
	{
		$this->nip = $nip;

		return $this;
	}

	public function getStreet(): ?string
	{
		return $this->street;
	}

	public function setStreet(string $street): self
	{
		$this->street = $street;

		return $this;
	}

	public function getBuildingNumber(): ?int
	{
		return $this->buildingNumber;
	}

	public function setBuildingNumber(int $buildingNumber): self
	{
		$this->buildingNumber = $buildingNumber;

		return $this;
	}

	public function getFlatNumber(): ?string
	{
		return $this->flatNumber;
	}

	public function setFlatNumber(?string $flatNumber): self
	{
		$this->flatNumber = $flatNumber;

		return $this;
	}

	public function getZipCode(): ?string
	{
		return $this->zipCode;
	}

	public function setZipCode(string $zipCode): self
	{
		$this->zipCode = $zipCode;

		return $this;
	}

	public function getCity(): ?string
	{
		return $this->city;
	}

	public function setCity(?string $city): self
	{
		$this->city = $city;

		return $this;
	}
}
