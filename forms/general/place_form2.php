<table width="100%" border="0">
  <tr>
    <td>
      <form name="form1" id="form1">
	  <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;</p>
      

         <input type="text" name="referal"   id="find_obj_cell" width="200"  autocomplete="off"  onkeyup=" findObj()" >
		 
<div id="l_obj_group" style="height:60; overflow:auto; width:auto; font:x-small" ></div>

       
    
        
        <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1084;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</p>
        <p>&#1053;&#1072;&#1089;&#1077;&#1083;&#1077;&#1085;&#1085;&#1099;&#1081; &#1087;&#1091;&#1085;&#1082;&#1090;
         <input type="text" name="find_city"   id="find_city" width="200"  autocomplete="off"  onkeyup=" findcity()" > <select name="l_city" id="l_city" onchange="changeV('address',this.options[this.selectedIndex].value)">
            <? $s_city='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1075;&#1086;&#1088;&#1086;&#1076; --  </option>';
		include_once("..\link\link.php");
		$t_c=0;
			 $q_city=mysql_query ('SELECT name, id, type_city FROM city_zab  order by type_city, id ');
				while ($r_city = mysql_fetch_row($q_city)) 
					{ if ($r_city[0] == ""){}
						else{
								if($t_c==$r_city[2]){$op_gr="";}
								else{
								if($t_c==0){$end="";}
								else {$end="</optgroup>";}
						 $q_reg=mysql_query ('Select name FROM  `district_zab`  where id="'.$r_city[2].'" order by id ');
				while ($r_reg = mysql_fetch_row($q_reg)) 
						 $op_gr=$end.'<optgroup label="'.iconv("utf-8","windows-1251",$r_reg[0]).'">';}
						$s_city=$s_city.$op_gr.'<option value="'.$r_city[1].'"> '.iconv("utf-8","windows-1251",$r_city[0]).'</option>';
							}
							$t_c=$r_city[2];
					}
					
					echo $s_city; ?>
          </select>
          <script charset= utf-8>$(function addStreet(){
    $('#l_city').change(function(){ 
	  
      //  var val2=  document.getElementById("find_street").value;
        var val = $(this).val(); 
		findstreet($(this).val())//???????? option
       /* $.ajax({
            type:'post',
			url:'forms/obr/street_sp.php',//?????????? php
			data:{'city_zab='+val, 'val='val2},//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
            success:function(result){// ???????? ????? ? ???????
                $('#l_street').html(result);//??????? ?? ????????
				
            }

        })*/
       // console.log($(this).val());
    })
})</script>
        </p>
        <div id="address" style="display:none" >
          &#1059;&#1083;&#1080;&#1094;&#1072; 
      <input type="text" name="referal"   id="find_street" width="200"  autocomplete="off"  onkeyup=" findstreet($('#l_city').value)" ><select name="l_street" id="l_street">
          </select>

        <p>
           &#1044;&#1086;&#1084; 
           <input type="number" size="3" name="house" id="house"/>
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
		  <?
		  $op1='<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; --</option>';
		 include_once("..\link\link.php");
			 $q_incom=mysql_query ("SELECT name_type, Id_type_violation FROM type_violation ");
				while ($r_incom = mysql_fetch_row($q_incom)) 
					{ if ($r_incom[0] == ""){}
						else{
						//echo '<option value="'.$r_incom[1].'"> '.$r_incom[0].'</option>';
								$op1=$op1.'<option value="'.$r_incom[1].'"> '.iconv("utf-8","windows-1251",$r_incom[0]).'</option>';
							}
					}
					
					echo $op1;
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
          <input type="button" name="add_option_obr" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;" onclick="<? echo $_POST['fun']; ?>" />
        </p>
      </form>     </td>
    <td><div name="tab_op_obr" id="t_o_o">
	
	</div></td>
  </tr>
</table>
