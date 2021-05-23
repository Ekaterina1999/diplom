<head> <title>&#1043;&#1054;&#1057;&#1059;&#1044;&#1040;&#1056;&#1057;&#1058;&#1042;&#1045;&#1053;&#1053;&#1040;&#1071; &#1048;&#1053;&#1057;&#1055;&#1045;&#1050;&#1062;&#1048;&#1071; &#1047;&#1040;&#1041;&#1040;&#1049;&#1050;&#1040;&#1051;&#1068;&#1057;&#1050;&#1054;&#1043;&#1054; &#1050;&#1056;&#1040;&#1071;</title>

                <meta http-equiv="Content-Type" content="text/html; charset=utf-8, windows-1251 " />
				
                <meta name="author" content="Ian Main" />
                <meta name="Copyright" content="Creative Commons - http://creativecommons.org/licenses/by/2.0/" />
					<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
				<script src="forms/js/add_obr.js"></script>
				<script src="forms/js/form_el.js"></script>
				<script src="forms/js/add_pred.js"></script>
				<script src="forms/js/add_rasp.js"></script>	
				<script src="forms/js/add_act.js"></script>	
				<script src="forms/js/add_predpis.js"></script>	
				<script src="forms/js/add_predpis_old.js"></script>	
				<script src="forms/js/add_U_protocol.js"></script>
				<script src="forms/js/add_U_pred.js"></script>	
				<script src="forms/js/add_zadan.js"></script>
				<script src="forms/js/add_protocol.js"></script>	
				<script src="forms/js/general.js"></script>		
				<script src="js/function_load_page.js"></script>
				<script src="forms/js/report_fun.js"></script>
				<script src="forms/js/add_zadan.js"></script>
<script src="forms/js/report_rmw3.js"></script>

  <style type="text/css">
<!--
body {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        margin: 0;
        font-size: 80%;
        font-weight: bold;
        background: #B0E0E6;
  }
  </style>
              
<style type="text/css; charset=utf-8, windows-1251 ">
body {
	background-color: 66CCFF;
	background-image: url();
}
</style>
<style>
.button_menu {
    width: 100%;  
	font-size:larger; 
}
ul {
        list-style: none;
        margin: 0;
        padding: 0;
		align:center;
        }

.button_style_1 {
white-space: normal;
    width: 100%;  
	height:100%;
	font-size:larger; 
	align:center;
}
.td_style_1{
white-space: normal;
	height:100; 
	width:10; 
	align:center;
}
.td_style_2{
    white-space: normal;  
	height:100; 
	width:20; 
	align:center;
}
.td_style_3{
    white-space: normal;  
	height:100; 
	width:30;
	align:center; 
}
.td_style_4{
    white-space: normal;  
	height:100; 
	width:40; 
	align:center;
}
.td_style_5{
	white-space: normal;
	height:100; 
	width:40; 
	align:center;
}
.td_style_6{
    white-space: normal;
	height:100; 
	width:10; 
	align:center;
}
.td_style_7{
    white-space: normal;  
	height:100; 
	width:40; 
	align:center;
}
.td_style_8{
    white-space: normal;  
	height:100; 
	width:50;
	align:center; 
}
.td_style_9{
    white-space: normal;  
	height:100; 
	width:30;
	align:center; 
}

.стиль1 {
	font-family: "Times New Roman", Times, serif;
	font-style: italic;
}
</style>

</head>

<body>
<? include_once("forms\link\link.php");?>
<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0" id="main_table">
<tr>
<td width="1160" height="136" bgcolor="#B0E0E6" id="td_header"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
<tr>
<td width="0%">&nbsp;</td>
<td width="97%" valign="bottom">
<table width="1160" border="0" align="center" cellpadding="0" cellspacing="0" id="main_table">
<tr>
<td>
<div align="left" width="1160" height="205" style="text-align: center; charset=utf-8,windows-1251" ><img width="500" height="150" src="img/main.jpg"  /> </div></td><td><p align="center">&#1043;&#1054;&#1057;&#1059;&#1044;&#1040;&#1056;&#1057;&#1058;&#1042;&#1045;&#1053;&#1053;&#1040;&#1071; &#1048;&#1053;&#1057;&#1055;&#1045;&#1050;&#1062;&#1048;&#1071; &#1047;&#1040;&#1041;&#1040;&#1049;&#1050;&#1040;&#1051;&#1068;&#1057;&#1050;&#1054;&#1043;&#1054; &#1050;&#1056;&#1040;&#1071;</p>
  <p align="center">&#1046;&#1059;&#1056;&#1053;&#1040;&#1051; &#1046;&#1048;&#1051;&#1053;&#1040;&#1044;&#1047;&#1054;&#1056;&#1040; &#1080; &#1051;&#1048;&#1062;&#1050;&#1054;&#1053;&#1058;&#1056;&#1054;&#1051;&#1071;</p></td></tr></table>
 
     
      </img>
	   <form id="authorization" name="authorization"  method="post"
	    <? if ($_COOKIE['username']==""){ echo 'style="display:block"';}else{ echo 'style="display:none"';} ?> 
	   >
	   <p align="center">&#1051;&#1086;&#1075;&#1080;&#1085;
  <?  echo  ' <select name="log" id="log" >';
	  echo '<option value=""></option>';
     include_once("forms/workers.php");
    echo'</select>'; ?>
	&#1055;&#1072;&#1088;&#1086;&#1083;&#1100; 
  
       <input type="password" name="pw" id="pw" onKeyUp="autorization_key('log','pw',event)" /><input type="button" name="button"  value="&#1055;&#1086;&#1076;&#1090;&#1074;&#1077;&#1088;&#1076;&#1080;&#1090;&#1100;"   onclick="autorizationbase('log','pw')" />
    </p>
  </form>
	  <div name="autorizate" id="autorizate" <? if ($_COOKIE['username']==""){ echo 'style="display:none"';}else{echo 'style="display:block"';} ?> >
	  <?  echo 'Вы работаете под именем:';?>
	  <b id="user_name_val">
	 <? if ($_COOKIE['username']==""){}
	  else{ echo $_COOKIE['username'];} ?>
	  </b>
	    <input type="button" name="exitbase" value="Выход" onClick="deleteCookie()" />
	 
	  <div id="user_create_div" align="right" <? if ($_COOKIE['userhead']==""){ echo 'style="display:none"';}else{echo 'style="display:block"';} ?>>
	  &#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; документов &#1086;&#1090; &#1080;&#1084;&#1077;&#1085;&#1080; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103; 
      <p><form><select name="user_create" id="user_create" onChange=""><? 	
	 $op1='<option  selected="selected" value="'.$_COOKIE['userid'].'">&#1058;&#1077;&#1082;&#1091;&#1097;&#1080;&#1081; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1100; </option>';
$q_text='SELECT `id`,`FIO` FROM `workers` where (`id`<>"'.$_COOKIE['userid'].'") order by  `FIO`';
//echo $q_text.' ';
$q=mysql_query ($q_text) or die (mysql_error());
while ($r = mysql_fetch_row($q)) 
					{ if ($r[0]==""){}else 
					{$op1=$op1.'<option value="'.$r[0].'">'.$r[1].'</option>';}
					}
echo $op1; ?>
          </select></form></p>
		  </div> </div>
	  </td>
<td width="3%"></td>
</tr>
</table></td>
</tr>
<tr>
<td height="422" bgcolor="#B0E0E6"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="23%" height="700" valign="top" id="td_menu">
<? if ($_COOKIE['username']==""){}
else{
include_once("forms/menu.php"); }?> </td>
<td width="74%" valign="top" bgcolor="#B0E0E6" id="td_center">
  <div id="main_page_val">
  </div>
  <div id="l_menu">
  </div>
    <div id="menu_add_data">
  </div>
  </td>
<td width="3%" valign="top"    align="center" bgcolor="#B0E0E6" id="td_center" ><form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
<p>&nbsp;</p>
</form></td>
<td width="0%" bgcolor="#B0E0E6" valign="top" id="td_menu_right">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td height="39" bgcolor="#B0E0E6" id="td_footer"></td>
</tr>
</table>
</body>
</html>