<?php

  class User
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    // Regsiter user
    public function register($data)
    {
      $this->db->query('INSERT INTO users(name, password, type_id) VALUES(:name, :password, :type_id)');

      // Bind values
      $this->db->bind(':name', $data['name']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':type_id', $data['user_type_id']);

      // Execute
      if ($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    // Login User
    public function login($name, $password)
    {
      $this->db->query('SELECT * FROM users WHERE name = :name');
      $this->db->bind(':name', $name);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if (password_verify($password, $hashed_password))
      {
        return $row;
      }
      else
      {
        return false;
      }
    }

    // Find user by email
    public function findUserByEmail($email)
    {
      $this->db->query('SELECT * FROM users WHERE email = :email');

      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if ($this->db->rowCount() > 0)
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    // Get user by id
    public function getUserById($id)
    {
      $this->db->query('SELECT * FROM users WHERE id = :id');

      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    // Get user by name
    public function findUserByName($name)
    {
      $this->db->query('SELECT * FROM users WHERE name = :name');

      // Bind value
      $this->db->bind(':name', $name);

      $row = $this->db->single();

      return $row;
    }
  }