<?php
require_once __DIR__ . '/../models/UserType.php';

class User
{
    private int $id;
    private string $username;
    private string $firstName;
    private string $lastName;
    private UserType $userType;
    private string $salt;
    private string $hash;
}