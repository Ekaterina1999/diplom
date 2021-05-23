<head> <title>&#1043;&#1054;&#1057;&#1059;&#1044;&#1040;&#1056;&#1057;&#1058;&#1042;&#1045;&#1053;&#1053;&#1040;&#1071; &#1048;&#1053;&#1057;&#1055;&#1045;&#1050;&#1062;&#1048;&#1071; &#1047;&#1040;&#1041;&#1040;&#1049;&#1050;&#1040;&#1051;&#1068;&#1057;&#1050;&#1054;&#1043;&#1054; &#1050;&#1056;&#1040;&#1071;</title>

                <meta http-equiv="Content-Type" content="text/html; charset=utf-8, windows-1251 " />
                <meta name="author" content="Ian Main" />
                <meta name="Copyright" content="Creative Commons - http://creativecommons.org/licenses/by/2.0/" />
					<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
				<script src="forms/js/add_obr.js"></script>
				<script src="js/function_load_page.js"></script>
  <style type="text/css">
<!--
body {
        font-family: Verdana, Arial, Helvetica, sans-serif;
        margin: 0;
        font-size: 80%;
        font-weight: bold;
        background: #66CCFF;
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

<table width="1200" border="0" align="center" cellpadding="0" cellspacing="0" id="main_table">
<tr>
<td width="1160" height="136" bgcolor="#66CCFF" id="td_header"><table width="100%" border="0" align="right" cellpadding="0" cellspacing="0">
<tr>
<td width="0%">&nbsp;</td>
<td width="97%" valign="bottom">
<table width="1160" border="0" align="center" cellpadding="0" cellspacing="0" id="main_table">
<tr>
<td>
<div align="left" width="1160" height="205" style="text-align: center; charset=utf-8,windows-1251" ><img width="500" height="150" src="img/main.jpg"  /> </div></td><td><p align="center">&#1043;&#1054;&#1057;&#1059;&#1044;&#1040;&#1056;&#1057;&#1058;&#1042;&#1045;&#1053;&#1053;&#1040;&#1071; &#1048;&#1053;&#1057;&#1055;&#1045;&#1050;&#1062;&#1048;&#1071; &#1047;&#1040;&#1041;&#1040;&#1049;&#1050;&#1040;&#1051;&#1068;&#1057;&#1050;&#1054;&#1043;&#1054; &#1050;&#1056;&#1040;&#1071;</p>
  <p align="center">&#1046;&#1059;&#1056;&#1053;&#1040;&#1051; &#1046;&#1048;&#1051;&#1053;&#1040;&#1044;&#1047;&#1054;&#1056;&#1040; &#1080; &#1051;&#1048;&#1062;&#1050;&#1054;&#1053;&#1058;&#1056;&#1054;&#1051;&#1071;</p></td></tr></table>
 
     
      </img>
	   <form id="authorization" name="authorization" enctype="multipart/form-data"  method="post"
	    <? if ($_COOKIE['username']==""){ echo 'style="display:block"';}else{ echo 'style="display:none"';} ?> 
	   >
	   <p align="center">&#1051;&#1086;&#1075;&#1080;&#1085;
  <?  echo  ' <select name="log" id="log" >';
	  echo '<option value=""></option>';
     include_once("forms/workers.php");
    echo'</select>'; ?>
	&#1055;&#1072;&#1088;&#1086;&#1083;&#1100; 
  
       <input type="password" name="pw" id="pw" /><input type="button" name="button"  value="&#1055;&#1086;&#1076;&#1090;&#1074;&#1077;&#1088;&#1076;&#1080;&#1090;&#1100;"   onclick="autorizationbase('log','pw')" />
    </p>
  </form>
	  <div name="autorizate" id="autorizate" <? if ($_COOKIE['username']==""){ echo 'style="display:none"';}else{echo 'style="display:block"';} ?> >
	  <?  echo 'Вы работаете под именем:';?>
	  <b id="user_name_val">
	 <? if ($_COOKIE['username']==""){}
	  else{ echo $_COOKIE['username'];} ?>
	  </b>
	    <input type="button" name="exitbase" value="Выход" onclick="deleteCookie()" />
	  </div>
	  
	  </td>
<td width="3%"></td>
</tr>
</table></td>
</tr>
<tr>
<td height="422" bgcolor="#66CCFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
<tr>
<td width="23%" height="700" valign="top" id="td_menu">
<? if ($_COOKIE['username']==""){}
else{
include_once("forms/menu.php"); }?> </td>
<td width="74%" valign="top" bgcolor="#66CCFF" id="td_center">
  <div id="main_page_val">
    <p>Все победы начинаются с победы над самим собой. </p>
    <p class="стиль1">Леонид Леонов</p>
  </div>
  <div id="l_menu">
  </div>
    <div id="menu_add_data">
  </div>
  </td>
<td width="3%" valign="top"    align="center" bgcolor="#66CCFF" id="td_center" ><form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
<p>&nbsp;</p>
</form></td>
<td width="0%" bgcolor="#66CCFF" valign="top" id="td_menu_right">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td height="39" bgcolor="#66CCFF" id="td_footer"></td>
</tr>
</table>
</body>
</html>