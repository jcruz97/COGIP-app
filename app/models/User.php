<?php

  class User
  {
    private $db;

    public function __construct()
    {
      $this->db = new Database;
    }

    // Add user
    public function add($data)
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

    public function getUsers()
    {
      $this->db->query('SELECT *,
                        users.id as userId,
                        users_type.id as typeId
                        FROM users
                        INNER JOIN users_type
                        ON users.type_id = users_type.id
                        ORDER BY users.id ASC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function updateUser($data)
        {
            $this->db->query('UPDATE users SET name = :name, password = :password, type_id = :type_id WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
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

    // Find user by Name
    public function findUserByName($name)
    {
      $this->db->query('SELECT * FROM users WHERE name = :name');

      // Bind value
      $this->db->bind(':name', $name);

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



    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM users WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);
  
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
  }