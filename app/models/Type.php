<?php

    class Type
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getTypes()
        {
            $this->db->query('SELECT * FROM type');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getUsersTypes()
        {
            $this->db->query('SELECT * FROM users_type');

            $results = $this->db->resultSet();

            return $results;
        }
    }