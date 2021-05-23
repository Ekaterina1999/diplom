
<div id="rating_work" >
<form>
<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1090;&#1076;&#1077;&#1083;
    <select id="sel_rmw">
	<? include_once("..\link\link.php");
$id_user=$_COOKIE['userid'];
$text_q='SELECT  `id_department` FROM  `workers` WHERE  `id` = "'.$id_user.'"';
//$val=""
$q_obj=mysql_query ($text_q)or die (Mysql_error());
while ($r_obj = mysql_fetch_row($q_obj))
 {
 if ($r_obj[0]==0){}else{$val=$r_obj[0];}}
 
		  if ($val==1){echo '
         <option value="1">&#1042;&#1099;&#1077;&#1079;&#1076;&#1085;&#1086;&#1081;</option>
      '; }else{
		  if ($val==2){echo '<option value="2">&#1044;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;&#1088;&#1085;&#1099;&#1081;</option>'; }
		  else{echo '<option value="0" selected="selected">&#1042;&#1089;&#1077;</option>
         <option value="1">&#1042;&#1099;&#1077;&#1079;&#1076;&#1085;&#1086;&#1081;</option>
         <option value="2">&#1044;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;&#1088;&#1085;&#1099;&#1081;</option>'; }
		  }
	?>
         
      </select>
</p>
  <p>&nbsp;</p>
  <p>&#1057; 
    <input name="date_rmw1"  type="date" id="date_rmw1" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> 
    &#1055;&#1086;
    <input name="date_rmw2"  type="date" id="date_rmw2" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/>
</p>
  <p>
    <input type="button" name="start_b_rmw" id="start_b_rmw" value="&#1057;&#1092;&#1086;&#1088;&#1084;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; &#1086;&#1090;&#1095;&#1077;&#1090;" onclick="start_rw()" />
 
  </p>
</form>
<div id="result_rw" name="result_rw" style="display:block"></div>
</div>
