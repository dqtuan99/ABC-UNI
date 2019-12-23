<!DOCTYPE html><html><head>

<title>Test</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/TestBackEnd/css/table/table.css">
</head><body>
	<form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" /> 
    </form> 
	
<?php
	require_once("MVC/control/control.php");
	require_once("Connect/excel/excel.php");
	if(array_key_exists('button1', $_POST)) { 
            button(); 
        }
    function button(){ 
		$std = new Control();
		$std->proc();
	}	

?>
</body></html>
	
