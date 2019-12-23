<script src="jquery/jquery-3.4.1.min.js"></script>
<script src="jquery/printThis.js"></script>
<?php
include"Student.php";?>
<html>
<div class="print-area">
        <table style="width: 100%; border: none; border-collapse: collapse;">
            <tbody><tr>
                <td style="width: 40%; text-align: center; vertical-align: top;">
                    <p style="text-transform: uppercase; font-weight:bold ; margin: 0; padding: 0; font-size: 12pt;">TRƯỜNG ĐẠI HỌC ABC</p>
                    
                </td>
                <td style="width: 60%; text-align: center; vertical-align: top;">
                    <p style="text-transform: uppercase; font-weight: bold; margin: 0; padding: 0; font-size: 12pt;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
                    <p style="margin: 0; padding: 0; font-weight: bold;">Độc lập - Tự do - Hạnh phúc</p>
                </td>
            </tr>
        </tbody></table>
        <h1 style="text-align: center; text-transform: uppercase; font-weight: bold; font-size: 14pt; margin: 30px 0 0 0; padding: 0;">KẾT QUẢ ĐĂNG KÝ MÔN HỌC - HỌC KỲ 2 NĂM HỌC 2019-2020</h1>
        <p style="text-align: center; font-weight: bold; margin: 0; padding: 0; font-size: 14pt;">
            Ngày 24 tháng 12 năm 2019
        </p>
        
            <?php 
			$std=new Student();
			$data=$std->SelectStudentExam('2');			
			echo "<table>";
            echo "<tr>";
            echo "<td>cathi_id</td>";
            echo "<td>room_name</td>";
            echo "<td>ten_mon_hoc</td>";
            echo "<td>ngaythi</td>";
            echo "<td>start</td>";
			echo "<td>end</td>";
            echo "</tr>";  
            foreach ($data as $r) {
                    echo "<tr>";
                    echo "<td>".$r["cathi_id"]."</td>";
                    echo "<td>".$r["room_name"]."</td>";
                    echo "<td>".$r["ten_mon_hoc"]."</td>";
                    echo "<td>".$r["ngaythi"]."</td>";
                    echo "<td>".$r["start"]."</td>";
					echo "<td>".$r["end"]."</td>";
                    echo "</tr>";
             }
            echo "</table>";
		?>
    </div>
	<button class="print" name="print" onclick="printA()">
							print
						</button> 
</html>
<script> function printA(){
$('.print-area').printThis();}
</script>