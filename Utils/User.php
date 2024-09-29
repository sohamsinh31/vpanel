<?php

class User
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $permissions;
    private $is_verified;
    private $is_approved;

    // Constructor
    public function __construct($data = [])
    {
        $this->id = $data['id'] ?? null;
        $this->username = $data['username'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->password = $data['password'] ?? '';
        $this->role = $data['role'] ?? 'user';
        $this->permissions = $data['permissions'] ?? 'NA';
        $this->is_verified = $data['is_verified'] ?? 0;
        $this->is_approved = $data['is_approved'] ?? 0;
    }

    // Add a method to convert the User object to an array
    public function toArray()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
            'permissions' => $this->permissions,
            'is_verified' => $this->is_verified,
            'is_approved' => $this->is_approved
        ];
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function isVerified()
    {
        return $this->is_verified;
    }

    public function isApproved()
    {
        return $this->is_approved;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;
    }

    public function setIsVerified($is_verified)
    {
        $this->is_verified = $is_verified;
    }

    public function setIsApproved($is_approved)
    {
        $this->is_approved = $is_approved;
    }
}
