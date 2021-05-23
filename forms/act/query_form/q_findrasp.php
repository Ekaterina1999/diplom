<?php 

include_once("..\..\link\link.php");
$id_rasp=$_POST['id_rasp'];


$q_text='select `num_order`, `date_order`, `order_year`, `id_order` from `order` where num_order like "%'.$val.'%"';
  
//echo $q_text;
$q_choice=mysql_query($q_text)or die (Mysql_error());

				while ($r_choice = mysql_fetch_row($q_choice)) 
					{ if ($r_choice[0] == ""){}
						else{?
					
	}
echo $op;
?>