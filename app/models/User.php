<?php

class User implements JsonSerializable
{
    private int $userId;
    private string $email;
    private string $firstName;
    private string $lastName;
    private string $hashPassword;
    private string $userType;

    public function jsonSerialize() : mixed
    {
        return [
            'userId' => $this->userId,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'hashPassword' => $this->hashPassword,
            'userType' => $this->userType
        ];
    }
    public function getId() : int
    {
        return $this->userId;
    }

    public function setId(int $id) : void
    {
        $this->userId = $id;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function setEmail(string $email) : void
    {
        $this->email = $email;
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


    public function getHash() : string
    {
        return $this->hashPassword;
    }

    public function setHash(string $hash) : void
    {
        $this->hashPassword = $hash;
    }

    public function getUserType() : string
    {
        return $this->userType;
    }

    public function setUserType(string $userType) : void
    {
        $this->userType = $userType;
    }

}