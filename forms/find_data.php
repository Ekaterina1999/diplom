<?
$id_msg=$_POST['referal'];

include_once("link\link.php");
$data_find = $_POST["val_text"];
$val=$_POST['val'];

if ($val=="1"){find_incoming($data_find);}
if ($val=="2"){find_obj($data_find);}


function find_incoming($data_find){
$q_text=	'SELECT `id`,`num_incoming`,`incoming_date` FROM `incoming` where num_incoming like"%'.$data_find.'%" order by num_incoming';

$op3=$op3.'<p><label>
          <input name="l_in" type="checkbox" checked="true" id="all_in"/ > Выделить все</label></p>';	
	
$q_obj=mysql_query ($q_text);
				while ($r_obj = mysql_fetch_row($q_obj)) 
					{ if ($r_obj[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op3=$op3.'<p><label>
          <input name="l_in" type="checkbox" checked="true" value="'.$r_obj[0].'"/ > '.$r_obj[1].' &#1086;&#1090;: '.date('d.m.Y',strtotime($r_obj[2])).'</label></p>';
							}
					}

echo $op3;
}



function find_obj($data_find){
$q_text=	'SELECT Name_org, id FROM complaints_obj where Name_org like"%'.$data_find.'%" order by Name_org';

$op3=$op3.'<p><label>
          <input name="l_obj" type="checkbox" checked="true" id="all_obj"/ > Выделить все</label></p>';	
	
$q_obj=mysql_query ($q_text);
				while ($r_obj = mysql_fetch_row($q_obj)) 
					{ if ($r_obj[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op3=$op3.'<p><label>
          <input name="l_obj" type="checkbox" checked="true" value="'.$r_obj[1].'"/ > '.$r_obj[0].'</label></p>';
							}
					}

echo $op3;
}

?>