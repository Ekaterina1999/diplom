<style type="text/css">
<!--
.?????1 {font-size: xx-large}
.?????1 {font-weight: bold}
-->
</style>
<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1079;&#1072;&#1076;&#1072;&#1085;&#1080;&#1103; </strong>
</div>
<form id="zadan_form_create" name="zadan_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->
</p>

  
  <p>&#1044;&#1072;&#1090;&#1072; &#1079;&#1072;&#1076;&#1072;&#1085;&#1080;&#1103; 
        <input type="date" name="date_zadan" id="date_zadan"  value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> </p>
     
       &#1054;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085;&#1086; &#1085;&#1072;  &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1080;
       <select name="choice_list" id="choice_list" onchange="" >
  </select>
          <select name="period" id="period" onchange="load_choice(1)" >
  		  
          </select>
		  <select name="user_choice" id="user_choice" onchange="load_choice(1)"  >
          </select>
		 
		  <p>&#1042;&#1080;&#1076; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103;
		    <select  id="vid_zadan" >'
	 <?php
	 include_once("..\link\link.php");
	  echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT `id`, `name` FROM `type_tasks`  order by  `name`" );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[0].'">'.iconv("utf-8","windows-1251",$option_r[1]).'</option>';}}
	 ?>
	 </select></p>
		  <p>&#1057;&#1074;&#1077;&#1076;&#1077;&#1085;&#1080;&#1103; &#1086; &#1088;&#1077;&#1079;&#1091;&#1083;&#1100;&#1090;&#1072;&#1090;&#1072;&#1093; &#1084;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103; &#1087;&#1086; &#1082;&#1086;&#1085;&#1090;&#1088;&#1086;&#1083;&#1102;
		    <select  id="result_zadan" >'
	 <?php
	 include_once("..\link\link.php");
	  echo '<option value=""></option>';
     $select_q=mysql_query ("SELECT `id`, `name` FROM `results_tasks` order by  `name`" );
	 while ($option_r = mysql_fetch_row($select_q)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[0].'">'.iconv("utf-8","windows-1251",$option_r[1]).'</option>';}}
	 ?>
	 </select></p>
		  
		
	
	
	
<div align="left" >
  <input  type="button" name="zadan_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="add_zadan()" />

  <input  type="button" name="zadan_b_c" align="center"  value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" url='index.php' />
</div>
</form>  
  