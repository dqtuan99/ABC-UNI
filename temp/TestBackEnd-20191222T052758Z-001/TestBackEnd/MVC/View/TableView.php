<?php 

   class TableView {
        private $data;
        public function __construct($data) {
			$this->data=$data;
        }
        
        public function listView() {
	        echo "<table>";
            echo "<tr>";
            echo "<td>Mã</td>";
            echo "<td>Họ tên</td>";
            echo "<td>Số điện thoại</td>";
            echo "<td>Thành Phố</td>";
            echo "<td>Ngày sinh</td>";
            echo "</tr>";  
            foreach ($this->data as $r) {
                    echo "<tr>";
                    echo "<td>".$r["student_id"]."</td>";
                    echo "<td>".$r["FullName"]."</td>";
                    echo "<td>".$r["phone"]."</td>";
                    echo "<td>".$r["Country"]."</td>";
                    echo "<td>".$r["birthday"]."</td>";
                    echo "</tr>";
             }
            echo "</table>";
        }			
				  
				  
		 }
   
?>


      
