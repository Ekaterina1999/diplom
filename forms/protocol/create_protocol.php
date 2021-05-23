<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1072;</strong></div>
<form id="protocol_form_create" name="protocol_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->
       <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1077; &#1085;&#1072; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083; 
         <select name="choice_list" id="choice_list" onchange="protocol_v()" >
         </select>
         <select name="period" id="period" onchange="load_choice(6)" >
         </select>
         <select name="user_choice" id="user_choice" onchange="load_choice(6)"  >
         </select>
</p>
<div id="data_uved" style="display:none">
<div id="d_u" ></div>
<hr size=2px align="center">
</div>
  <p >&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1076;&#1072;&#1090;&#1091; &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1072; <?php
  $timezone = "Yakutsk";
  date_default_timezone_set($timezone);
  $today = date("Y-m-d");
  $time = time();
?>
    <input  type="date" id="date_p" value="<?php echo $today; ?>"/>
  </p>
       <p>&#1059;&#1082;&#1072;&#1078;&#1080;&#1090;&#1077; &#1089;&#1090;&#1072;&#1090;&#1100;&#1102;.</p>
  <p><select  id="find_adm_violation" >'
	 <?php
	 include_once("..\link\link.php");
	  echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT  `id_article` ,  `article` FROM  `article` order by  `article`" );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[0].'">'.iconv("utf-8","windows-1251",$option_r[1]).'</option>';}}
	 ?>
	 </select>
  </p>
  <p>&#1044;&#1086;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1080;&#1103;</p>
  <p><textarea id="dop"></textarea></p>
  <div align="left" class="&#1089;&#1090;&#1080;&#1083;&#1100;1">
  <input  type="button" name="protocol_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="add_protocol()" />
  
  <input  type="button" name="protocol_b_c2" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;"  url='index.php' /></form>
<div id="test"></div>
 
  