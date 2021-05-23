<table width="100%" border="0">
  <tr>
    <td>
      <form name="form1" id="form1">
      
    
        
        <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1084;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080;</p>
        <p>&#1053;&#1072;&#1089;&#1077;&#1083;&#1077;&#1085;&#1085;&#1099;&#1081; &#1087;&#1091;&#1085;&#1082;&#1090;
          <input type="text" name="find_city"   id="find_city" width="200"  autocomplete="off"  onkeyup=" findcity()" />
          <select name="l_city" id="l_city" onchange="changeV('address',this.options[this.selectedIndex].value)">
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
           <input type="text" size="10" name="house" id="house"/>
        </p>
		</div>
      </form>     </td>
  </tr>
</table>
