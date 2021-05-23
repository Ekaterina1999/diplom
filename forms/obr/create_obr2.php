<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<p align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103;</strong></p>

<table width="100%" border="0">
  <tr>
    <td>
	
	<form  name="data_in_form">
				<p>&#8470; &#1042;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
		      <p><input  type="text" name="num_in_sp" /></p>
		      <p>&#1044;&#1072;&#1090;&#1072; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
		      <p><input  type="date" name="date_in_sp"   /></p>
			  <p>
			    <input  type="button" name="out" value="&#1042;&#1085;&#1077;&#1089;&#1090;&#1080; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1077; &#1074; &#1089;&#1087;&#1088;&#1072;&#1074;&#1086;&#1095;&#1085;&#1080;&#1082;"  width="100%"  onclick="addTabIncoming($(num_in_sp).val(), $(date_in_sp).val())" />
			  </p>
	</form>	</td>
    <td><div name="tab_incoming_doc" id="t_i_d">

	</div></td>
  </tr>
  </table>
<!--  <tr>
    <td>
      <form name="form1" id="form1">
	  <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;</p>
      

         <input type="text" name="referal"   id="find_obj_cell" width="200"  autocomplete="off"  onkeyup=" findObj()" >
		 
<div id="l_obj_group" style="height:60; overflow:auto; width:auto; font:x-small" ></div>

       
    
        
        <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1084;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</p>
        <p>&#1053;&#1072;&#1089;&#1077;&#1083;&#1077;&#1085;&#1085;&#1099;&#1081; &#1087;&#1091;&#1085;&#1082;&#1090;
          <select name="l_city" id="l_city" onchange="changeV('address',this.options[this.selectedIndex].value)">
            <? /* $s_city='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
		
			 $q_city=mysql_query ('SELECT name, id FROM city_zab  order by kod ');
				while ($r_city = mysql_fetch_row($q_city)) 
					{ if ($r_city[0] == ""){}
						else{
						$s_city=$s_city.'<option value="'.$r_city[1].'"> '.iconv("utf-8","windows-1251",$r_city[0]).'</option>';
							}
					}
					
					echo $s_city; ?>
          </select>
          <script charset= utf-8>$(function addStreet(){
    $('#l_city').change(function(){
        var val = $(this).val(); //???????? option
        $.ajax({
            type:'post',
			url:'forms/obr/street_sp.php',//?????????? php
			data:'city_zab='+val,//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
            success:function(result){// ???????? ????? ? ???????
                $('#l_street').html(result);//??????? ?? ????????
				
            }

        })
       // console.log($(this).val());
    })
})</script>
        </p>
        <div id="address" style="display:none" >
          &#1059;&#1083;&#1080;&#1094;&#1072; 
      <select name="l_street" id="l_street">
          </select>

        <p>
           &#1044;&#1086;&#1084; 
           <input type="text" size="3" name="house" id="house"/>
        </p>
        <p>&#1050;&#1086;&#1088;&#1087;&#1091;&#1089; 
           <input type="text" size="3" name="korpus" id="korpus"/>
        </p>
        <p >
           &#1050;&#1074;&#1072;&#1088;&#1090;&#1080;&#1088;&#1072; 
           <input type="text" size="3" name="flat" id="flat"/>
        </p>
		</div>
        <p>&nbsp;</p>
        <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</p>
        <p>&#1058;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; 
          <select name="t_v" id="t_v" onchange="changeVviolation('o_v_v','v_v',this.options[this.selectedIndex].value)">
		  <?/*
		  $op1='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; --</option>';
		 
			 $q_incom=mysql_query ("SELECT name_type, Id_type_violation FROM type_violation ");
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op1=$op1.'<option value="'.$r_incom[1].'"> '.iconv("utf-8","windows-1251",$r_incom[0]).'</option>';
							}
					}
					
					echo $op1;*/
		  ?>
          </select>
        </p>
	
        <p id="o_v_v"  style="display:none">&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; 
		
          <select name="o_v" id="o_v" onchange="changeV('v_v',this.options[this.selectedIndex].value); addSelviolation(this.options[this.selectedIndex].value);">
       </select>
        </p>
        <p id="v_v"  style="display:none">
          &#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077;
          <select name="v" id="v">
          </select>
</p>

        <p>
          <input type="button" name="add_option_obr" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;" onclick="addTab_obr()" />
        </p>
      </form>       <p>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077;</p>
<p>
          <textarea id="note_text"></textarea>
</p>
      <p>
        <input  type="button" name="create_obr" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;" onclick="addBaseObr('in_doc_base')" />
        
        <input type="button" name="cansel_obr" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" />
      </p></td>
    <td><div name="tab_op_obr" id="t_o_o">
	
	</div></td>
  </tr>
</table>-->
<? $_POST['fun']="addTab_obr()";; include_once('..\general\place_form.php'); ?>
<div>
  <p>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077;</p>
<p>
          <textarea id="note_text"></textarea>
</p>
      <p>
        <input  type="button" name="create_obr" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;" onclick="addBaseObr('in_doc_base')" />
        
        <input type="button" name="cansel_obr" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" onchange="cancel_obr()" />
      </p></td>
    <td><div name="tab_op_obr" id="t_o_o">
	
	</div>