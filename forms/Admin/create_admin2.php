<style type="text/css">
<!--
.?????1 {color: #FF0000}
.?????1 {color: #FF3300}
-->
</style>
<div align="center" ><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103; </strong> </div>
<div id="dataphp" style="display:none"></div>
<form id="admin_create_user" name="admin_create_user" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->
       <table width="100%" border="0">
         <tr>
           <td width="50%"> <p>&#1059;&#1082;&#1072;&#1078;&#1080;&#1090;&#1077; &#1060;&#1048;&#1054; &#1087;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1103; </p>
             <p>
               <input  type="text" name="user_fio" id="user_fio"  value=""/>
             </p>
             <p>&#1059;&#1082;&#1072;&#1078;&#1080;&#1090;&#1077; &#1076;&#1086;&#1083;&#1078;&#1085;&#1086;&#1089;&#1090;&#1100; </p>
             <p>
               <input  type="text" name="user_post" id="user_post" value=""/>
             </p>
             <p>&#1047;&#1072;&#1076;&#1072;&#1081;&#1090;&#1077; &#1087;&#1072;&#1088;&#1086;&#1083;&#1100; </p>
             <p>
               <input  type="text" name="user_ps" id="user_ps" value="" min=1 max=11/>
             </p>
             <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1090;&#1076;&#1077;&#1083;</p>
             <p>
               <select  name="depat" id="depat"  >
                 <?php 
				include_once("..\link\link.php");
     $q_depat=mysql_query ('SELECT  name, id FROM department ');
	 while ($option_r = mysql_fetch_row($q_depat)) 
	{if ($option_r[0] == ""){}else{echo '<option value="'.$option_r[1].'">'.$option_r[0].'</option>';}}
	 ?>
               </select>
             </p>
             <p>&nbsp;</p>
             <p>
               <input  type="checkbox" name="ruc_ot" value=" "/>
  &#1056;&#1091;&#1082;&#1086;&#1074;&#1086;&#1076;&#1080;&#1090;&#1077;&#1083;&#1100;</p>
           <p ><span class="&#1089;&#1090;&#1080;&#1083;&#1100;1" >(&#1077;&#1089;&#1083;&#1080; &#1076;&#1086;&#1083;&#1078;&#1085;&#1086;&#1089;&#1090;&#1100; &#1088;&#1091;&#1082;&#1086;&#1074;&#1086;&#1076;&#1103;&#1097;&#1072;&#1103; &#1087;&#1086;&#1089;&#1090;&#1072;&#1074;&#1100;&#1090;&#1077; &#1075;&#1072;&#1083;&#1086;&#1095;&#1082;&#1091;) </span></p></td>
           <td><?php 
		   $q_t_menu=mysql_query ('SELECT   id_menu, name FROM menu_form');
				while ($r_m = mysql_fetch_row($q_t_menu)) 
				{ if (!$r_m){}
				else{					
				echo '<p><input  type="checkbox" name="menu_use" value="" id="'.$r_m[0].'"/>'.$r_m[1].'</p>';
				}}
		   
		   ?></td>
         </tr>
       </table>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
        <div align="left" class="&#1089;&#1090;&#1080;&#1083;&#1100;1" id="butdiv"></div>
  <input  type="button" name="adm_add" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;"  align="center" onclick="createuserbase()" />
  
  <input  type="button" name="adm_out" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" onclick="cancel_admin()"/> </form>
 
  