
  <?
 /* if(($_POST[LogInSist]==0)or($_POST[LogInSist]=="")) {*/
 echo ' <form id="authorization" name="authorization" enctype="multipart/form-data"  method="post">';
  echo '<p align="center">&#1051;&#1086;&#1075;&#1080;&#1085;';
    echo  ' <select name="log" id="log" >';
	  echo '<option value=""></option>';
     include_once("forms/workers.php");
    echo'</select>';
	 echo' &#1055;&#1072;&#1088;&#1086;&#1083;&#1100;'; 
  
        echo'<input type="password" name="pw" id="pw" /><input type="button" name="button" ';
		 echo'value="&#1055;&#1086;&#1076;&#1090;&#1074;&#1077;&#1088;&#1076;&#1080;&#1090;&#1100;"   onclick="autorizationbase('."'".'log'."'".','."'".'pw'."'".')" />';
    echo'</p>';
  echo'  </form>';
	
	
   /*/   }
	  else { 
	  $log = $_COOKIE['log'];
	  echo "&#1058;&#1077;&#1082;&#1091;&#1097;&#1080;&#1081; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1100;:".$log;
	  echo'<a href="index.php">EXIT <?php include_once("forms/exit_user.php");?></a>'; }
	  
echo $_POST[LogInSist];
echo $_COOKIE['log'];*/
?>  
