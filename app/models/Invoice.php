<?php
class Invoice {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // list the invoices
    public function list(){
        $this->db->query('SELECT 
                        invoices.id,
                        `number`,
                        `date`,
                        companies.name as company_name, 
                        companies.type_id as company_type,
                        type.type 
                        FROM `invoices` 
                        INNER JOIN `companies`,`type` 
                        WHERE `company_id` = companies.id && companies.type_id = type.id 
                        ORDER BY invoices.id');
        
        return $this->db->resultSet();
    }
    public function companiesList(){
        // get the company list for dropdown 
        $this->db->query('SELECT * FROM `companies`');
        return $this->db->resultSet();
    }

    //insert to table
    public function insert($data){
        $this->db->query('INSERT INTO invoices (number, date, company_id) VALUES(:number, :date, :company_id)');
        $this->db->bind(':number', $data['invoice_number']);
        $this->db->bind(':date', $data['invoice_date']);
        $this->db->bind(':company_id', $data['invoice_company']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    //insert to table
    public function updateInv($data){
        $this->db->query('UPDATE `invoices` SET `number`= :number, `date`= :date, `company_id` = :company_id WHERE `id`=:id');
        $this->db->bind(':number', $data['invoice_number']);
        $this->db->bind(':date', $data['invoice_date']);
        $this->db->bind(':company_id', $data['invoice_company']);
        $this->db->bind(':id', $data['id']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
        // delete invoice
        public function editInvoice($id){
            $this->db->query('SELECT * FROM invoices WHERE id = :id');
            $this->db->bind(':id', $id);
            if($inv = $this->db->single()){
                return $inv;
            }else{
                return false;
            }
        }
    

    // delete invoice
    public function deleteInvoice($id){
        $this->db->query('DELETE FROM invoices WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Detail invoice
    public function detailInvoice($id){
        $this->db->query('SELECT * FROM invoices WHERE id = :id');
        $this->db->bind(':id', $id);
        if($inv = $this->db->single()){
            return $inv;
        }else{
            return false;
        }
    }
    //Detail companies
    public function detailCompanies($id){
        $this->db->query('SELECT * FROM companies WHERE id = :id');
        $this->db->bind(':id', $id);
        if($inv = $this->db->single()){
            return $inv;
        }else{
            return false;
        }
    }
    //Detail people
    public function detailPeople ($id){
        $this->db->query('SELECT * FROM people WHERE company_id = :id');
        $this->db->bind(':id', $id);
        if($inv = $this->db->single()){
            return $inv;
        }else{
            return false;
        }
    }


}