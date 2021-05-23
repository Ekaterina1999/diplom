<?
$id_msg=$_POST['referal'];

include_once("link\link.php");
$data_find = $_POST["val"];
if ($data_find==""){
echo "";
		
} else{
		$q_text=	'SELECT Name_org, id FROM complaints_obj where Name_org like"%'.$data_find.'%" order by Name_org';
		
$q_obj=mysql_query ($q_text);
				while ($r_obj = mysql_fetch_row($q_obj)) 
					{ if ($r_obj[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op3=$op3.'<p><label>
          <input name="l_obj" type="radio" value="'.$r_obj[1].'"/ > '.$r_obj[0].'</label></p>';
							}
					}

echo $op3;}
?>