<?php

	class PDOData{
		private $db = null;

		public function __construct() {
			try {

				$this->db = new PDO("mysql:host=localhost;dbname=abcuni_db;", "root", "");
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}
		
		public function __destruct() {
			try {
				$this->db = null;
			} catch(PDOException $ex) { echo $ex->getMessage();	}
		}
		
		public function doQuery($query) {
			try {
    $result =$this->db->query($query); 
    $result->setFetchMode(PDO::FETCH_ASSOC); 
    $ret = $result->fetchAll();
	return $ret;
			} catch(PDOException $ex) {	echo $query; }
			
		}

		public function doSql($sql) {
		    $count = 0;
			try {
				$count = $this->db->exec($sql);
			} catch(PDOException $ex) {
				echo $sql;
			}
		}
	}
	
