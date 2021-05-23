<?php
global $LogInSist, $log, $pw, $menu_button_clic;
$log = $_POST['log'];
$pw = $_POST['pw'];
include_once("..\link\link.php");
$r=mysql_query ("select name_button, content, id from load_main_page " );
while ($myrow = mysql_fetch_row($r)) 
{if( isset( $_POST[$myrow[0]] ) ) 
{echo'<meta http-equiv="Refresh" content="0; URL=../../index.php">';
$_COOKIE['menu_select_id']=$myrow[2];}}  
