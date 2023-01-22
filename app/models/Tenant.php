<?php

class Tenant implements JsonSerializable
{
    private int $tenantId;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;
    private string $dateOfBirth;

    public function jsonSerialize() : mixed{
        return [
            'id' => $this->tenantId,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phoneNumber' => $this->phoneNumber,
            'dateOfBirth' => $this->dateOfBirth
        ];
    }

    public function getId() : int
    {
        return $this->tenantId;
    }

    public function setId(int $id) : void
    {
        $this->tenantId = $id;
    }

    public function getFirstName() : string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }

    public function getLastName() : string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function getPhoneNumber() : string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber) : void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getDateOfBirth() : string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth) : void
    {
        $this->dateOfBirth = $dateOfBirth;
    }


}

