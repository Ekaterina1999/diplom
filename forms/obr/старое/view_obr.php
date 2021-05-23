<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; </strong></div>
<form id="obr_form_create" name="obr_form_create" enctype="multipart/form-data"  method="post">
<!--<input  type="date" name="find_date_in_begin"    />-->
<table width="100%" border="0">
  <tr>
    <td align="center"  border="1"><p>&nbsp;</p>
      <p>
        <?php

			include_once('query_form\query_in.php');	
	list_incoming($op);
	
	echo $op;
	
		?>
</p>
      <p>&nbsp;</p></td>
  	<td align="center"  width="30%">
  	
  	  <p>&#8470; &#1042;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
  	  <p>
        <input  type="text" name="num_in_sp"  class="button_style_1" />
      </p>
  	  <p>&#1044;&#1072;&#1090;&#1072; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
  	  <p>
        <input  type="date" name="date_in_sp"  class="button_style_1" />
      </p>
  	  <p>
        <input  type="button" name="out" value="&#1042;&#1085;&#1077;&#1089;&#1090;&#1080; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1077; &#1074; &#1089;&#1087;&#1088;&#1072;&#1074;&#1086;&#1095;&#1085;&#1080;&#1082;"  width="100%" />
      </p></td>
  </tr>
</table>
  
  &#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;
   <p><?php			include_once('query_form\query_in.php');	
					list_type_violation($op1);
					echo $op1;
		?>  </p>
	<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;</p>
    <p> <?php			include_once('query_form\query_in.php');	
						list_obj($op3);
						echo $op3;
		?></p>
      <form id="obr_form" name="obr_form" enctype="multipart/form-data"  method="post">
	    <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1084;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; </p>
	    <p>
	      <?php
			include_once('query_form\query_in.php');	
	list_city($s_city);
	echo $s_city;
	
		?>
        </p>
	    <p>&#1044;&#1086;&#1084;
	      <input  type="text" name="house" size="4" class="button_style_1" /> 
	      &#1050;&#1086;&#1088;&#1087;&#1091;&#1089;
	      <input  type="text" name="housing"  size="3" class="button_style_1" /> 
	      &#1050;&#1074;&#1072;&#1088;&#1090;&#1080;&#1088;&#1072;
	      <input  type="text" name="flat" size="3" class="button_style_1" />
        </p>
</form>
      <p>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077;</p>
       <textarea ></textarea>
 
	 <p><input  type="button" name="obr_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;" class="button_style_1" />

	<input  type="button" name="obr_b_c" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" class="button_style_1" url='index.php' />
	</p>
	

 </form>

  