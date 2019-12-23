<?php

    require_once("MVC/model/student.php");
    require_once("MVC/view/tableview.php");
    class Control{
	public $data;
        public function __contruct() {
        }
        	
		public function proc() {
	
			$std = new Student();
			$this->data=$std->getStudentByClass(2);			
			$stdctrl = new TableView($this->data);
			$stdctrl->listView();
		
        }
		
	
	
    }

?>