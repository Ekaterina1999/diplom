<?php

global $LogInSist, $log, $pw, $menu_button_clic,$global;
$log = $_POST['log'];
$pw = $_POST['pw'];


 include_once("link\link.php");


$r=mysql_query ("select name_button, content, id from load_main_page " );
while ($myrow = mysql_fetch_row($r)) 
{ 		 if 
(isset( $_POST[$myrow[0]] ) )


  		  {include_once($myrow[1]);  $menu_button_clic[1]=$myrow[1]; $menu_button_clic[0]=$myrow[0];
	
		  }

	
}  

echo $_COOKIE['menu_select_id'];


?>