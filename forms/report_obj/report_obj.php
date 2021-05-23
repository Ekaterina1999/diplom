
<div id="rating_work" >
<form>
<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1090;&#1076;&#1077;&#1083;
    <select id="sel_report">
	
<option value="0" selected="selected">&#1042;&#1089;&#1077;</option>
         <option value="1">&#1042;&#1099;&#1077;&#1079;&#1076;&#1085;&#1086;&#1081;</option>
         <option value="2">&#1044;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;&#1088;&#1085;&#1099;&#1081;</option>
         
      </select>
</p>
  <p>&nbsp;</p>
  <p>&#1057; 
    <input name="d1"  type="date" id="d1" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> 
    &#1055;&#1086;
    <input name="d2"  type="date" id="d2" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> 
    </p>
   <p>
    <input type="button" name="start_r" id="start_r" value="&#1057;&#1092;&#1086;&#1088;&#1084;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; &#1086;&#1090;&#1095;&#1077;&#1090;" onclick="start_report_all('report_obj')" />
	
 <input type="button" align="right" name="ex" id="ex" value="  &#1069;&#1082;&#1089;&#1087;&#1086;&#1088;&#1090;" onclick="Excel()" disabled="disabled" />
 
   </p>
</form>
<div id="result_r" name="result_r" style="display:block"></div>
</div>
