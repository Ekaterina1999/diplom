	<table>
		<tr><td width="50%">
		<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;</p>
        <p>&#1058;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; 
          <select name="t_v_r" id="t_v_r" onchange="changeVviolation_all('_r','o_v_v_r','v_v_r',this.options[this.selectedIndex].value)">
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
	
        <p id="o_v_v_r"  style="display:none">&#1054;&#1073;&#1098;&#1077;&#1082;&#1090; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; 
		
          <select name="o_v_r" id="o_v_r" onchange="changeV('v_v_r',this.options[this.selectedIndex].value); addSelviolation_all('_r',this.options[this.selectedIndex].value);">
       </select>
        </p>
        <p id="v_v_r"  style="display:none">
          &#1053;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1077;
          <select name="v_r" id="v_r">
          </select>
</p>

        <p>
		<input type="button" name="edit_option_viol" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100;" onclick="edit_viol_act()" />
		</p>
		</td></tr>
		</table>