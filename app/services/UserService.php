<?php

require __DIR__ . '/../repositories/UserRepository.php';
require __DIR__ . '/../models/User.php';

class UserService{
    
        public function login(string $email, string $password) : User
        {
            $repository = new UserRepository();
            $user = $repository->getByEmail($email);
    
            if($user == null){
                return false;
            }
    
            if($user->getPassword() == $password){
                return true;
            }
    
            return false;
        }
    
        public function register(string $email, string $password) : bool
        {
            $repository = new UserRepository();
            $user = $repository->getByEmail($email);
    
            if($user != null){
                return false;
            }
    
            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
    
            $repository->save($user);
    
            return true;
        }
}