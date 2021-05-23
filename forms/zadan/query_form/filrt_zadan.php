<div id="filtr_div_zadan" style="display:none">
 &#1060;&#1080;&#1083;&#1100;&#1090;&#1088;<br />
 <br />
  &#8470;

  <label>
    <input  type="text" id="num_filter"  value="<? if ($_POST['num_filter']==""){$num_filter="";}else{
$num_filter=$_POST['num_filter'];}
echo $num_filter  ?>"/>
  </label>

 &#1044;&#1080;&#1072;&#1087;&#1072;&#1079;&#1086;&#1085; &#1076;&#1072;&#1090;: 
 <label>&#1089;<input type="date" id="date_filter1" value="<? if ($_POST['date_filter1']==""){$date_filter1="";}else{
$date_filter1=$_POST['date_filter1'];}
echo $date_filter1  ?>"  /></label>
 <label> &#1087;&#1086;<input type="date" id="date_filter2"  value="<? if ($_POST['date_filter2']==""){$date_filter2="";}else{
$date_filter2=$_POST['date_filter2'];}
echo $date_filter2  ?>" /></label>
  <br/>
  <p>&#1055;&#1086;&#1083;&#1100;&#1079;&#1086;&#1074;&#1072;&#1090;&#1077;&#1083;&#1100;
    <select  id="user_filter">
 <? 

 include_once("..\..\link\link.php");
 $t_work='<option value="0"></option>';
		
	
			 $q_work=mysql_query ('SELECT `id`, `FIO` FROM `workers` where not(`id`in(35,34)) order by `FIO`');
				while ($r_work = mysql_fetch_row($q_work)) 
					{ 
					if($_POST['user_filter']==""){$sel="";}else{
					if ($r_work[0]!==$_POST['user_filter']){$sel="";}else{$sel='selected="selected"';
					// echo $_POST['vid_filter'].'=='.$r_work[0];
					 }}
							$t_work=$t_work.'<option '.$sel.' value="'.$r_work[0].'"> '.iconv("utf-8","windows-1251",$r_work[1]).'</option>';
						
					}
					
					echo $t_work; ?> 
  </select>
  </p>
  <p>&#1054;&#1089;&#1085;&#1086;&#1074;&#1072;&#1085; &#1085;&#1072; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1080;  &#8470; 
 
    <label>
    <input  type="text" id="num_filter_obr"  value="<? if ($_POST['num_filter_obr']==""){$num_filter_obr="";}else{
$num_filter_obr=$_POST['num_filter_obr'];}
echo $num_filter_obr  ?>"/>
    </label>
&#1044;&#1080;&#1072;&#1087;&#1072;&#1079;&#1086;&#1085; &#1076;&#1072;&#1090;:
<label>&#1089;
<input  type="date" id="date_filter1_obr" value="<? if ($_POST['date_filter1_obr']==""){$date_filter1_obr="";}else{
$date_filter1_obr=$_POST['date_filter1_obr'];}
echo $date_filter1_obr  ?>">
</label>
<label> &#1087;&#1086;
<input  type="date" id="date_filter2_obr"  value="<? if ($_POST['date_filter2_obr']==""){$date_filter2_obr="";}else{
$date_filter2_obr=$_POST['date_filter2_obr'];}
echo $date_filter2_obr  ?>" />
</label>
</p>
  
  <hr size="2px" align="center">
 
 <? include_once('..\..\general\place_form3.php'); 
echo  " <script charset= utf-8>document.getElementById('find_city').value=".'"'.iconv("utf-8","windows-1251",$_POST['find_city']).'"'.";document.getElementById('find_street').value=".'"'.iconv("utf-8","windows-1251",$_POST['find_street']).'"'.";document.getElementById('house').value=".'"'.iconv("utf-8","windows-1251",$_POST['house']).'"'.";findcity();findstreet($('#l_city').value);</script>";
 ?>
 
  <p align="right">
    <input type="button" value="&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100;"  onclick="filer_add_svod('1')"/>
    <input type="button" value="&#1057;&#1073;&#1088;&#1086;&#1089;&#1080;&#1090;&#1100;" onclick="filer_add_svod_clear()"/>
  </p>
  <hr size="2px" align="center">
  <label></label>
</div>
