
<div id="rating_work" >
<form>
<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1090;&#1076;&#1077;&#1083;
    <select id="sel_monitoring" onchange="otdel_monitoring()">
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
    <input name="d_1"  type="date" id="d_1" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> 
    &#1055;&#1086;
    <input name="d_2"  type="date" id="d_2" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/>
</p>

  <div style="border:hidden">  <p>&#1048;&#1089;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1077;&#1083;&#1100;&#1085;&#1099;&#1077; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1099;:</p>

  <table>
  <tr>
  <td>
    <input type="checkbox" class="document_gi" value="1" />
    &#1054;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; 
	</td>
	<td>
    <input type="checkbox" class="document_gi" value="2" checked="checked" />
    &#1056;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1103;
	</td>
	<td>
	   <input type="checkbox" class="document_gi" value="3"/>
    &#1047;&#1072;&#1076;&#1072;&#1085;&#1080;&#1103;
	</td>
	
  </tr>
   <tr>
  <td>
    <input type="checkbox" class="document_gi" value="4" />
    &#1059;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103; 
	</td>
	<td>
    <input type="checkbox" class="document_gi" value="5" checked="checked" />
    &#1055;&#1088;&#1077;&#1076;&#1086;&#1089;&#1090;&#1077;&#1088;&#1077;&#1078;&#1077;&#1085;&#1080;&#1103;
	</td>
	<td>
	   <input type="checkbox" class="document_gi" value="6" checked="checked"/>
    &#1040;&#1082;&#1090;&#1099;
	</td>
	
  </tr> <tr>
  <td>
    <input type="checkbox" class="document_gi" value="7"  checked="checked"/>
    &#1055;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103; 
	</td>
	<td>
    <input type="checkbox" class="document_gi" value="8" />
    &#1059;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103; &#1085;&#1072; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1099;
	</td>
	<td>
	   <input type="checkbox" class="document_gi" value="9"  checked="checked"/>
    &#1055;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1099;
	</td>
	
  </tr></table>
	
  </div>
  <div>
    <p>
      <input type="checkbox" id="worker_monitor" onchange='div_nide("worker_monitor","w_h");otdel_monitoring();' />
      &#1042;&#1099;&#1073;&#1088;&#1072;&#1090;&#1100; &#1082;&#1086;&#1085;&#1082;&#1088;&#1077;&#1090;&#1085;&#1086;&#1075;&#1086; &#1089;&#1086;&#1090;&#1088;&#1091;&#1076;&#1085;&#1080;&#1082;&#1072;</p>
    <div id="w_h" style="display:none">&nbsp;
      <input  type="checkbox" id="del_w_m" onclick="otdel_monitoring()"/> 
      &#1059;&#1095;&#1080;&#1090;&#1099;&#1074;&#1072;&#1090;&#1100; &#1091;&#1076;&#1072;&#1083;&#1077;&#1085;&#1085;&#1099;&#1093; &#1089;&#1086;&#1090;&#1080;&#1088;&#1091;&#1076;&#1085;&#1080;&#1082;&#1086;&#1074;
      <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1089;&#1086;&#1090;&#1088;&#1091;&#1076;&#1085;&#1080;&#1082;&#1072;
          <select id="fio_worker_m">
            </select>
      </p>
    </div>
  </div>
  <p>
    <input type="button" name="start_b_monitoring" id="start_b_monitoring" value="&#1057;&#1092;&#1086;&#1088;&#1084;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; " onclick="start_monitoring()" />
    
  </p>
</form>
<div id="result_monitoring" name="result_monitoring" style="display:block"></div>
</div>
