<div id="report_main_work_tab" >
<form>
  <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1090;&#1076;&#1077;&#1083;
    <select id="sel_rmw">
         <option value="0" selected="selected">&#1042;&#1089;&#1077;</option>
         <option value="1">&#1042;&#1099;&#1077;&#1079;&#1076;&#1085;&#1086;&#1081;</option>
         <option value="2">&#1044;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072;&#1088;&#1085;&#1099;&#1081;</option>
       </select>
</p>
  <p>&#1043;&#1086;&#1076; 
  <select id="year_f" name="year_f"><?  $d=date_create();
		$Year_f= $d->format('Y');
		$l=0;
		
		for($x=2019; $x<=($Year_f);$x++){
		$l++;
		if($_POST['y_f']==""){
		if ($x==$Year_f){$selected="selected";}else{$selected="";}}else{
					if ($x==$_POST['y_f']){$selected="selected";}else{$selected="";

					// echo $_POST['vid_filter'].'=='.$r_work[0];
					 }}
		
		
		echo $_POST['y_f'].'<option value="'.$x.'" '.$selected.' >'.$x.'</option>';
		}
		?>"/></select></p>
  <p>&#1057; 
    <input name="date_rmw1"  type="date" id="date_rmw1" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/> 
    &#1055;&#1086;
    <input name="date_rmw2"  type="date" id="date_rmw2" value="<? $d=date_create();
		echo $d->format('Y-m-d');
		?>"/>
</p>
  <p>
    <input type="button" name="start_b_rmw" id="start_b_rmw" value="&#1057;&#1092;&#1086;&#1088;&#1084;&#1080;&#1088;&#1086;&#1074;&#1072;&#1090;&#1100; &#1086;&#1090;&#1095;&#1077;&#1090;" onclick="start_rmw()" />
  </p>
</form>
<div id="result_rmw" name="result_rmw" style="display:block"></div>
</div>
