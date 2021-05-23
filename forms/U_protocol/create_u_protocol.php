<style type="text/css">
<!--
.?????1 {font-size: xx-large}
-->
</style>
<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103; &#1085;&#1072; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083; </strong> </div>
<form id="U_protocol_form_create" name="U_protocol_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->


    
<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1076;&#1072;&#1090;&#1091; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103;
</p>
  <p>
    <?php
  $timezone = "Yakutsk";
  date_default_timezone_set($timezone);
  $today = date("Y-m-d");
  $time = time();
?>
    <input  type="date" id="date_u" value="<?php echo $today; ?>"/>
  </p>
  
     <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1076;&#1072;&#1090;&#1091; &#1087;&#1088;&#1086;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103;</p>
        <p>
		<?php
    $timezone = "Yakutsk";
  date_default_timezone_set($timezone);
  $today2 = time() + 24*60*60;

$time = time() + 24*60*60;

?>
          <input  type="date" id="date_m" value="<?php  echo date("Y-m-d", $today2);?>"/>
		  <input  type="time" id="time_m" value="<?php echo date("H:i", $time); ?>"/>
        </p>
        <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1072;&#1082;&#1090;
          <select name="choice_list" id="choice_list" onchange="U_protocol_v()" >
          </select>
          <select name="period" id="period" onchange="load_choice(4)" >
          </select>
          <select name="user_choice" id="user_choice" onchange="load_choice(4)"  >
          </select>
</p>
<div id="veiw_adr_obj" "display:none">
</div>
     <div id="admin_viol" style="display:none">   <p>&#1040;&#1076;&#1084;&#1080;&#1085;&#1080;&#1089;&#1090;&#1088;&#1072;&#1090;&#1080;&#1074;&#1085;&#1086;&#1077; &#1087;&#1088;&#1072;&#1074;&#1086;&#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077; &#1074;&#1099;&#1088;&#1072;&#1079;&#1080;&#1083;&#1086;&#1089;&#1100; &#1074; </p>
		<p>
		  <select id="a_v" onchange="a_v_fun()">
		    <option value="0"></option>
		     <?
		 
		include_once("..\link\link.php"); 
			 $q_incom=mysql_query ("SELECT `id_bav`, `name` FROM `base_adm_viol` ");
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op1=$op1.'<option value="'.$r_incom[0].'"> '.iconv("utf-8","windows-1251",$r_incom[1]).'</option>';
							}
					}
					
					echo $op1;
		  ?>	
	      </select>
  </p>
  <div id="predpis" style="display:none"></div>
</div>
		<p>
		  <input  type="button" name="U_protocol_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="add_u_protocol()" />
		  
          <input  type="button" name="U_protocol_b_c2" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;"  url='index.php' />
                    </p>
</form>
 
  