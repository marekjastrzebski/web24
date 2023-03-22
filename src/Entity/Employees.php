<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
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
class Employees
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private ?int $id = null;

	#[Assert\NotBlank]
	#[Assert\Regex(pattern: '/^[\s\p{L}]+$/u',message: 'firstName should contain only letters')]
	#[ORM\Column(length: 255)]
	private ?string $firstName = null;

	#[Assert\NotBlank]
	#[Assert\Regex(pattern: '/^[\s\p{L}]+$/u',message: 'lastName should contain only letters')]
	#[ORM\Column(length: 255)]
	private ?string $lastName = null;

	#[Assert\NotBlank]
	#[Assert\Email(message: 'Passed email is not valid email address')]
	#[ORM\Column(length: 255, unique: true)]
	private ?string $email = null;

	#[Assert\Length(
        min: 9,
        max: 13,
		minMessage: 'Passed phoneNumber is too short',
		maxMessage: 'Passed phoneNumber is too long')]
	#[Assert\Type(type: 'numeric',message: 'phoneNumber should be a number')]
	#[ORM\Column(type: 'bigint', nullable: true)]
	private ?string $phoneNumber = null;

	#[ORM\ManyToOne(targetEntity: Companies::class, cascade: ['persist', 'remove'])]
    #[Assert\NotBlank]
	private ?Companies $company = null;

	public function __construct()
	{
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getFirstName(): ?string
	{
		return $this->firstName;
	}

	public function setFirstName(string $firstName): self
	{
		$this->firstName = $firstName;

		return $this;
	}

	public function getLastName(): ?string
	{
		return $this->lastName;
	}

	public function setLastName(string $lastName): self
	{
		$this->lastName = $lastName;

		return $this;
	}

	public function getEmail(): ?string
	{
		return $this->email;
	}

	public function setEmail(string $email): self
	{
		$this->email = $email;

		return $this;
	}

	public function getPhoneNumber(): ?int
	{
		return $this->phoneNumber;
	}

	public function setPhoneNumber(null|int|string $phoneNumber): self
	{
		$this->phoneNumber = $phoneNumber;

		return $this;
	}

	public function getCompany(): ?Companies
	{
		return $this->company;
	}

	public function setCompany(?Companies $company): self
	{
		$this->company = $company;

		return $this;
	}
}
