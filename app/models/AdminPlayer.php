<?php 
    class AdminPlayer{
        public $db;
        public function __construct(){
            $this->db = new Database;
        }
    }