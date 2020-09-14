<?php

    class Company
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCompanies()
        {
            $this->db->query('SELECT name, id FROM companies');

            $results = $this->db->resultSet();

            return $results;
        }

        public function getCompaniesTypes()
        {
          $this->db->query('SELECT *,
                            companies.id as companyId,
                            type.id as typeId
                            FROM companies
                            INNER JOIN type
                            ON companies.type_id = type.id
                            ORDER BY companies.id DESC
                            LIMIT 5
                            ');

          $results = $this->db->resultSet();

          return $results;
        }

        public function getCompanyById($id)
        {
            $this->db->query('SELECT * FROM companies WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function addCompany($data)
        {
            $this->db->query('INSERT INTO
                              companies(name, country, vat, type_id)
                              VALUES
                              (:name, :country, :vat, :type_id)
                              ');

            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':vat', $data['vat']);
            $this->db->bind(':type_id', $data['type_id']);
      
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

        public function findVat($vat)
        {
            $this->db->query('SELECT * FROM companies WHERE vat = :vat');
            $this->db->bind(':vat', $vat);

            $row = $this->db->single();
            return $row;
        }

        public function deleteCompany($id)
        {
            $this->db->query('DELETE FROM companies WHERE id = :id');

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