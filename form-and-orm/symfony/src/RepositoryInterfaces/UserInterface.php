<?php


namespace App\RepositoryInterfaces;
use App\Entity\Users;

interface UserInterface
{
    public function newUser(Users $user);
    public function editUser();
    public function deleteUser($id);
    public function getUserAccountById();
    public function fetchUsersAccounts();
    public function getUserContactById();
    public function fetchUsersContacts();
}