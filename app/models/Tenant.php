<?php

class Tenant
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public string $phoneNumber;
    public string $dateOfBirth;
    public int $addressId;

    public __construct(int $id, string $firstName, string $lastName, string $email, string $phoneNumber, string $dateOfBirth, int $addressId)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->dateOfBirth = $dateOfBirth;
        $this->addressId = $addressId;
    }
}

