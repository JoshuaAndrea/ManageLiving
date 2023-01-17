<?php

class Tenant
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $phoneNumber;
    private string $dateOfBirth;

    public __construct(int $id, string $firstName, string $lastName, string $email, string $phoneNumber, string $dateOfBirth)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->dateOfBirth = $dateOfBirth;
    }
}

