<div id="filtr_div_predpis_old" style="display:block">
 &#1060;&#1080;&#1083;&#1100;&#1090;&#1088;<br />
 <br />
  &#8470;
 
  <label> <input type="text" id="num_filter"  value="<? if ($_POST['num_filter']==""){$num_filter="";}else{
$num_filter=$_POST['num_filter'];}
echo $num_filter  ?>"/></label>

 &#1044;&#1080;&#1072;&#1087;&#1072;&#1079;&#1086;&#1085; &#1076;&#1072;&#1090;: 
 <label>&#1089;<input type="date" id="date_filter1" value="<? if ($_POST['date_filter1']==""){$date_filter1="";}else{
$date_filter1=$_POST['date_filter1'];}
echo $num_filter  ?>"  /></label>
 <label> &#1087;&#1086;<input type="date" id="date_filter2"  value="<? if ($_POST['date_filter2']==""){$date_filter2="";}else{
$date_filter2=$_POST['date_filter2'];}
echo $num_filter  ?>" /></label>
<div>
 <p><input name="duble_filter" type="radio" value="1"  />
 &#1042;&#1089;&#1077;
 </p> 
 <p><input name="duble_filter" type="radio" value="2"  />
 &#1053;&#1077; &#1087;&#1086;&#1074;&#1090;&#1086;&#1088;&#1085;&#1099;&#1077; </p>
  <p><input name="duble_filter" type="radio" value="3"   />

  &#1055;&#1086;&#1074;&#1090;&#1086;&#1088;&#1085;&#1099;&#1077;  </p>
  </div>
  <p align="right"><input type="button" value="&#1055;&#1086;&#1082;&#1072;&#1079;&#1072;&#1090;&#1100;"  onclick="filer_add_predpis_old()"/><input type="button" value="&#1057;&#1073;&#1088;&#1086;&#1089;&#1080;&#1090;&#1100;" onclick="filer_add_predpis_clear()"/></p>
  <hr size="2px" align="center">
  <label></label>
</div>
