<style type="text/css">
<!--
.?????1 {color: #FF0000}
-->
</style>
<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103; </strong> </div>
<form id="predpis_form_create" name="predpis_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->
       <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1072;&#1082;&#1090;
         <select name="choice_list" id="choice_list" onchange="predpis_v()" >
         </select>
          <select name="period" id="period" onchange="load_choice(4)" >
  		  
          </select>
		  <select name="user_choice" id="user_choice" onchange="load_choice(4)"  >
          </select>
  </p>
       <p > &#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1076;&#1072;&#1090;&#1091; &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1103; </p>
       <p>
         <?php
  $timezone = "Yakutsk";
  date_default_timezone_set($timezone);
  $today = date("Y-m-d");
  $time = time();
?>
         <input  type="date" name="date_p" value="<?php echo $today; ?>"/>
  </p>
  <div id="viol_predpis" style="display:none">
  </div>
       <p>&nbsp;</p>
        <div align="left" class="&#1089;&#1090;&#1080;&#1083;&#1100;1">
  <input  type="button" name="predpis_add" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="add_predbis_base()" />
  
  <input  type="button" name="obr_b_c2" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;"  url='index.php' /></form>
 
  <div id="test"></div>