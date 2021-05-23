<div align="right"><input align="right"  type="submit" name="clear_form" value="&#1054;&#1090;&#1095;&#1080;&#1089;&#1090;&#1080;&#1090;&#1100; &#1092;&#1086;&#1088;&#1084;&#1091; "  width="100%" />
 <?php

			
			if (isset($_POST['clear_form'])) {include_once('clear_temp_tab.php');
			$user_id=1;			clear_user_temp($user_id);
			
			}
          
		?>

</div>
<div align="center"><strong>&#1057;&#1086;&#1079;&#1076;&#1072;&#1085;&#1080;&#1077; &#1085;&#1086;&#1074;&#1086;&#1075;&#1086; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1103; </strong></div>
		
		<table width="100%" border="0"><form id="obr_form_create" name="obr_form_create" enctype="multipart/form-data"  method="post">
  <tr>
    <td><form method="get" name="data_in_form">
				<p>&#8470; &#1042;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
		      <p><input  type="text" name="num_in_sp" /></p>
		      <p>&#1044;&#1072;&#1090;&#1072; &#1074;&#1093;&#1086;&#1076;&#1103;&#1097;&#1077;&#1075;&#1086; &#1076;&#1086;&#1082;&#1091;&#1084;&#1077;&#1085;&#1090;&#1072; </p>
		      <p><input  type="date" name="date_in_sp"   /></p>
			  <p><input  type="submit" name="out" value="&#1042;&#1085;&#1077;&#1089;&#1090;&#1080; &#1086;&#1073;&#1088;&#1072;&#1097;&#1077;&#1085;&#1080;&#1077; &#1074; &#1089;&#1087;&#1088;&#1072;&#1074;&#1086;&#1095;&#1085;&#1080;&#1082;"  width="100%" /></p>
		</form></td>
      <td><?php

			include_once('query_form\query_in.php');
			if (isset($_POST['out'])) {
			$user_id=1;
			list_incoming($user_id);
                    $num_in_sp = $_POST['num_in_sp'];
                    $date_in_sp = $_POST['date_in_sp'];
					$select_incoming = $_POST['select_incoming.text'];
					
					insert_obr_base_in($num_in_sp, $date_in_sp,$select_incoming,$user_id,$buf);
					$_COOKIE['buf1']=$_COOKIE['buf1'].$buf;
					echo $buf1;
						
						}
					else{					
     $op=1;  	
	list_incoming($op);}
	
	//echo $op;
	
		?></td>
  </tr>
  <tr>
    <td>


		


    <form method="post" name="obj_adress_v" >

		<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;</p>
      <p>
        <?php
			include_once('query_form\query_in.php');	
	list_obj($op3);
	echo $op3;
	
	
		?>
      </p>
		<form id="obr_form" name="obr_form" enctype="multipart/form-data"  method="post">
	    <p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1084;&#1077;&#1089;&#1090;&#1086; &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1082;&#1080; </p>
	   <form name="form">
    <select name="l_city" id="l_city">
      <?
  include_once('query_form\query_in.php');
  list_city($s_city);
  echo $s_city;
  ?>
    </select>
</form>

<script>$(function(){
    $('#l_city').change(function(){
        var val = $(this).val(); //???????? option
        $.ajax({
            type:'post',
            url:'street_sp.php',//?????????? php
            data:'city_zab='+val,//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
            success:function(result){// ???????? ????? ? ???????
                $('#res').html(result);//??????? ?? ????????
            }

        })
        console.log($(this).val());
    })
})</script>
<div id="res"></div><!--??? ??????? ????? ? ???????-->
		<p>&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103; </p>
        <p><form name="form">
		<select name="t_v" id="t_v">
<option value="0"> --&#1042;&#1099;&#1073;&#1077;&#1088;&#1080;&#1090;&#1077; &#1090;&#1080;&#1087; &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;-- </option>
          <?php
			include_once('query_form\query_in.php');	
	list_type_violation($op1);
	echo $op1;
	
	
		?>
		</select></form>
        </p>
		<p>
		<script>$(function(){
    $('#t_v').change(function(){
        var val = $(this).val(); //???????? option
        $.ajax({
            type:'post',
            url:'violation_type_sp.php',//?????????? php
            data:'t_v_id='+val,//???????? ???????? option. ?? ??????? ????? ???????? $_POST['value'}
            success:function(result){// ???????? ????? ? ???????
                $('#res1').html(result);//??????? ?? ????????
            }

        })
        console.log($(this).val());
    })
})</script>
<div id="res1"></div><!--??? ??????? ????? ? ???????-->
<div id="res2"></div><!--??? ??????? ????? ? ???????-->		
		
		</p>
		
          <input name="add_obj_obr" id="add_obj_obr" onclick="tab_obj_obr"  type="button" value="&#1044;&#1086;&#1073;&#1072;&#1074;&#1080;&#1090;&#1100; &#1086;&#1073;&#1098;&#1077;&#1082;&#1090;" />
       </form>      </td>
    <td>
	
	<div name="tab_add_obr" id="tab_add_obr" align="center"></div>
	<?php
$_SESSION['obj_l']= $_POST['l_obj'];
			include_once('query_form\query_in.php');
			$user_id=1;
			 echo $_user_id;
			    $l_obj = $_POST['l_obj'];
					$l_city = $_POST['l_city'];
					$l_street = $_POST['l_street'];
					$house = $_POST['house'];
                    $housing = $_POST['housing'];
					$flat = $_POST['flat'];
					$violate = $_POST['v'];
					  echo 'param&'.$l_obj .' '. $l_city .' '.$l_street .' '. $house .' '. $housing .' '.	$flat .' '.$violate .' '.$_user_id.'&';
			if (isset($_POST['add_obj_obr'])) {
                
				//	insert_obr_base_obj($l_obj , $l_city ,$l_street , $house , $housing ,	$flat ,$violate , $_user_id, $buf);
					//$buf1=$buf1.$buf;
					echo $buf;
						list_obj_in($user_id);
						}
					else{					
       	
	list_obj_in($user_id);
	}
	
	echo $op;
	
		?></td>
  </tr>
  </form>
</table>
 <p>&#1055;&#1088;&#1080;&#1084;&#1077;&#1095;&#1072;&#1085;&#1080;&#1077;</p>
<p>
          <textarea ></textarea>
          
</p>
 
     <table width="100%" border="0" align="center">
	<tr>
	<td>
	<input   type="submit" name="obr_b_c" value="&#1057;&#1086;&#1079;&#1076;&#1072;&#1090;&#1100;" class="button_style_1" />
	</td><td>
	<input  type="button" name="obr_b_back" value="&#1054;&#1090;&#1084;&#1077;&#1085;&#1072;" class="button_style_1" url='index.php' />
	
	</td>
  
  </tr> 
  </table>

  