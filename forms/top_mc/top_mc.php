<div id="form_top_mc" >
<p>&#1059;&#1082;&#1072;&#1078;&#1080;&#1090;&#1077; &#1087;&#1077;&#1088;&#1080;&#1086;&#1076; </p>
<form id="form1" name="form1" method="post" action="">
  &#1089;

   
	 <input type="date" id="date_begin_top_mc"
	  value="<? $year=date('Y'); echo $year.'-01-01'; ?>"  />
	 &#1087;&#1086;
	   <input type="date" id="date_end_top_mc" value="<? $d=date_create();
		echo $d->format('Y-m-d'); ?>" />
	<input type="button" onclick="result_report('157r')" value="&#1042;&#1099;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1100;"/>


</form>
<div id="param_157r"  style="display:none">
</div>
</div>


 <div id="form_1l" style="display:none">
<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1087;&#1077;&#1088;&#1080;&#1086;&#1076; </p>
<form id="form6" name="form6" method="post" action="">
  <p>

    <input type="number" id="year_report_universal" value="<? $year=date('Y'); echo $year; ?>"  width="25" maxlength="4"/>
	<input type="button" onclick="result_report('universal')" value="&#1042;&#1099;&#1087;&#1086;&#1083;&#1085;&#1080;&#1090;&#1100;"/>
</p>

</form>
<div id="param_universal"  style="display:block"></div></div>
