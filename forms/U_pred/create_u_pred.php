<style type="text/css">
<!--
.?????1 {font-size: xx-large}
-->
</style>
<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1091;&#1074;&#1077;&#1076;&#1086;&#1084;&#1083;&#1077;&#1085;&#1080;&#1103;</strong> </div>
<form id="U_pred_form_create" name="U_pred_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->


    <input type="hidden" name="rasp_id_u" /> 
	<div id="choice" name="choice" method="post" align="left" style="display:none" >  <p>&#1053;&#1072; &#1086;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1080;&#1080; &#1088;&#1072;&#1089;&#1087;&#1086;&#1088;&#1103;&#1078;&#1077;&#1085;&#1080;&#1103; 
       
        
		  <select name="choice_list" id="choice_list" onchange="address_rasp1()">
          </select>
          <select name="period" id="period" onchange="load_choice(3)" >
  		  
          </select>
		  <select name="user_choice" id="user_choice" onchange="load_choice(3)"  >
          </select></p>
  </div>  
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

<div id="veiw_adr_obj" "display:none">
</div>
     
		<p>
		  <input  type="button" name="U_pred_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="add_u_pred()" />
		  
          <input  type="button" name="U_pred_b_c2" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;"  url='index.php' />
  </p>
</form>
 
  