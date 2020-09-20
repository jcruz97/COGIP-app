<?php

    class Invoice
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function addInvoice($data)
        {
            $this->db->query('INSERT INTO invoices(number, date, company_id, people_id)
                              VALUES(:number, :date, :company_id, :people_id)
                              ');

            // Bind values
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':company_id', $data['company_id']);
            $this->db->bind(':people_id', $data['people_id']);
      
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

        public function getInvoices()
        {
          $this->db->query('SELECT *
                            FROM invoices
                            ORDER BY date DESC
                            ');

          $results = $this->db->resultSet();

          return $results;
        }

        public function get5Invoices()
        {
          $this->db->query('SELECT *,
                            invoices.id as invoiceId,
                            companies.id as companyId
                            FROM invoices
                            INNER JOIN companies
                            ON invoices.company_id = companies.id
                            ORDER BY date DESC
                            LIMIT 5
                            ');

          $results = $this->db->resultSet();

          return $results;
        }

        public function getInvoiceById($id)
        {
            $this->db->query('SELECT * FROM invoices WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function findInvoiceByNumber($number)
        {
            $this->db->query('SELECT * FROM invoices WHERE number = :number');
            $this->db->bind(':number', $number);

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

        public function updateInvoice($data)
        {
            $this->db->query('UPDATE invoices
                              SET number = :number, date = :date, company_id = :company_id, people_id = :people_id
                              WHERE id = :id
                              ');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':company_id', $data['company_id']);
            $this->db->bind(':people_id', $data['people_id']);
      
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

        public function deleteInvoice($id)
        {
            $this->db->query('DELETE FROM invoices WHERE id = :id');

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