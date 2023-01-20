<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repositories/Repository.php';

class UserRepository extends Repository{

    public function getByEmail($email) : User
    {
        
    }
    
}