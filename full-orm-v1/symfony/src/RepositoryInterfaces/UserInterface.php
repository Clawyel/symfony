<?php


namespace App\RepositoryInterfaces;
interface UserInterface
{
    public function newUser();
    public function editUser();
    public function deleteUser($id);
    public function getUserAccountById();
    public function fetchUsersAccounts();
    public function getUserContactById();
    public function fetchUsersContacts();
}