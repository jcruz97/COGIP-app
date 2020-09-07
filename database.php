<?php
class Database{
    private $host;
    private $db = 'cogip_app';
    private $user = "root";
    private $password = "mkahms139142215";
    function __construct($host){
        $this->host = $host;
    }
    function connect(){
        try
        {
            $bdd = new PDO("mysql:host=$this->host;dbname=$this->db;carset=utf8", $this->user, $this->password);
        }
        catch(Exception $e)
        {
            die("Error : " . $e->getMessage());
        }
        return $bdd;
    }
    
}