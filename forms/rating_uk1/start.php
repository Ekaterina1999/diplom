<?


 include_once("..\link\link.php");
 $d1=$_POST['d1'];
 $d2=$_POST['d2'];
 $t_q_obj=  'delete FROM `rating_uk` ';

$q_obj=mysql_query ($t_q_obj)or die (Mysql_error());
 
$t_q_obj=  'SELECT `id`, `Name_org`,  `ogrn`, `inn`, `kol_kv`, `area` FROM `complaints_obj` WHERE `license`="1"';
$c=0;
$q_obj=mysql_query ($t_q_obj)or die (Mysql_error());
while ($r_q_obj = mysql_fetch_row($q_obj))
 { 
 $c++;
   $t=  'SELECT * FROM `protocol` WHERE `id_notify`in (SELECT `id` FROM `notify_protocol` WHERE `id_act` in (SELECT `id` FROM `act` WHERE `obj_id`='.$r_q_obj[0].'))and `Date_protocol`>="'.$d1.'"  and `Date_protocol`<="'.$d2.'" and  `article`="15"  ';
//echo $t.' ';
$q=mysql_query ($t)or die (Mysql_error());
$c_v4=mysql_num_rows($q);
  $t=  'SELECT * FROM `protocol` WHERE `id_notify`in (SELECT `id` FROM `notify_protocol` WHERE `id_act` in (SELECT `id` FROM `act` WHERE `obj_id`='.$r_q_obj[0].')and `Date_protocol`>="'.$d1.'"  and `Date_protocol`<="'.$d2.'") ';
//echo $t.' ';
$q=mysql_query ($t)or die (Mysql_error());
$c_v3=mysql_num_rows($q);
 //$c_v4=$c_v5[0];
 
  $t=  ' SELECT * FROM `ordinance` WHERE `id` in(SELECT `id_ordinance` FROM `ordinance_violation` WHERE  `Date_plan`>="'.$d1.'"  and `Date_plan`<="'.$d2.'" and `eliminated`="0")  and`id_act` in (SELECT `id` FROM `act` WHERE `obj_id`='.$r_q_obj[0].') group by id ';
//echo $t.' ';
$q=mysql_query ($t)or die (Mysql_error());
$c_v2=mysql_num_rows($q);
 // $c_v3=$c_v2[0];
 $t=  'SELECT * FROM `ordinance_violation` WHERE `id_ordinance`in (SELECT `id` FROM `ordinance` WHERE `id_act` in (SELECT `id` FROM `act` WHERE `obj_id`='.$r_q_obj[0].')and `Date_ordinance`>="'.$d1.'"  and `Date_ordinance`<="'.$d2.'") ';
//echo $t.' ';
$q=mysql_query ($t)or die (Mysql_error());
$c_v=mysql_num_rows($q);
 //$c_v=$c_v1[0];
 $t_q_in=  "INSERT INTO `rating_uk`(`id`, `num_l`, `name`, `ogrn`, `inn`,`kol_d`, `area`,`id_obj`,`col_v`, `col_pred`,`col_ukl`, `col_p`) VALUES('".$c."','0','".$r_q_obj[1]."','".$r_q_obj[2]."','".$r_q_obj[3]."','".$r_q_obj[4]."','".$r_q_obj[5]."','".$r_q_obj[0]."','".$c_v."','".$c_v2."' ,'".$c_v4."','".$c_v3."')";
//echo $t_q_in;
$q_in=mysql_query ($t_q_in)or die (Mysql_error());
$c_v=0;
 } 
 
 
 
 $t_q_r=  'SELECT sum(`col_v`), sum(`col_pred`), sum(`col_ukl`), sum(`col_p`) FROM `rating_uk`';

$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
 {
  $sum_v=$r_q_r[0];
   $sum_pred=$r_q_r[1];
   $sum_ukl=$r_q_r[2];
    $sum_p=$r_q_r[3];
 
 }
 
 $t_q_r=  'SELECT `id_obj`,  `area`, `col_v`, `col_pred`,`col_ukl`, `col_p` FROM `rating_uk`';

$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
 {
 $r_v=(($r_q_r[2]/$r_q_r[1])*100000*5);
  $r_pred=($r_q_r[2]/$r_q_r[1])*100000*30;
   $r_ukl=($r_q_r[2]/$r_q_r[1])*100000*30;
    $r_p=($r_q_r[2]/$r_q_r[1])*100000*20;
	$r_sum=$r_v+$r_pred+$_ukl+$r_p;

	  $t=  ' UPDATE `rating_uk` SET `summ_r`="'.$r_sum.'",`r_v`="'.$r_v.'",`r_pred`="'.$r_pred.'",`r_ukl`="'.$r_ukl.'",`r_p`="'.$r_p.'" WHERE`id_obj`="'.$r_q_r[0].'"   ';
//echo $t.' ';
$q=mysql_query ($t)or die (Mysql_error());
  }
 
 
$tab='<table cellspacing="0" cellpadding="0" border="2" >
  <tr>
    <td height="115" width="46">&#8470;</td>
    <td width="78">&#1053;&#1086;&#1084;&#1077;&#1088; &#1083;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1080;</td>
    <td width="324">&#1059;&#1087;&#1088;&#1072;&#1074;&#1083;&#1103;&#1102;&#1097;&#1072;&#1103;    &#1086;&#1088;&#1075;&#1072;&#1085;&#1080;&#1079;&#1072;&#1094;&#1080;&#1103;</td>
    <td width="126">&#1054;&#1043;&#1056;&#1053; &#1083;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1072;&#1090;&#1072;</td>
    <td width="106">&#1048;&#1053;&#1053; &#1083;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1072;&#1090;&#1072;</td>
    <td width="111">&#1057;&#1074;&#1086;&#1076;&#1085;&#1099;&#1081; &#1088;&#1077;&#1081;&#1090;&#1080;&#1085;&#1075;    (&#1073;&#1072;&#1083;&#1083;&#1099;)</td>
    <td width="111">&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086; &#1076;&#1086;&#1084;&#1086;&#1074;    &#1074; &#1088;&#1077;&#1077;&#1089;&#1090;&#1088;&#1077; &#1083;&#1080;&#1094;&#1077;&#1085;&#1079;&#1080;&#1081; &#1056;&#1086;&#1089;&#1090;&#1086;&#1074;&#1089;&#1082;&#1086;&#1081; &#1086;&#1073;&#1083;&#1072;&#1089;&#1090;&#1080;</td>
    <td width="111">&#1055;&#1083;&#1086;&#1097;&#1072;&#1076;&#1100; (&#1084;2)</td>
        <td width="111">&#1050;&#1086;&#1083;&#1080;&#1095;&#1077;&#1089;&#1090;&#1074;&#1086;    &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1081;</td>
    <td width="111">&#1056;&#1077;&#1081;&#1090;&#1080;&#1085;&#1075; &#1087;&#1086;    &#1085;&#1072;&#1088;&#1091;&#1096;&#1077;&#1085;&#1080;&#1103;&#1084;</td>
    <td width="111">&#1053;&#1077;&#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1080;&#1077;    &#1087;&#1088;&#1077;&#1076;&#1087;&#1080;&#1089;&#1072;&#1085;&#1080;&#1081; (19.5)</td>
    <td width="109">&#1056;&#1077;&#1081;&#1090;&#1080;&#1085;&#1075; &#1087;&#1086;    &#1085;&#1077;&#1080;&#1089;&#1087;&#1086;&#1083;&#1085;&#1077;&#1085;&#1080;&#1102;</td>
    <td width="111">&#1059;&#1082;&#1083;&#1086;&#1085;&#1077;&#1085;&#1080;&#1077; &#1086;&#1090;    &#1087;&#1088;&#1086;&#1074;&#1077;&#1088;&#1086;&#1082; (19.4.1)</td>
    <td width="111">&#1056;&#1077;&#1081;&#1090;&#1080;&#1085;&#1075; &#1087;&#1086;    &#1091;&#1082;&#1083;&#1086;&#1085;&#1077;&#1085;&#1080;&#1102;</td>
    <td width="111">&#1055;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1099;</td>
    <td width="111">&#1056;&#1077;&#1081;&#1090;&#1080;&#1085;&#1075; &#1087;&#1086;    &#1087;&#1088;&#1086;&#1090;&#1086;&#1082;&#1086;&#1083;&#1072;&#1084;</td>
  </tr>';
$t_q_r=  'SELECT `id`, `num_l`, `name`, `ogrn`, `inn`, `summ_r`, `kol_d`, `area`, `col_v`, `r_v`, `col_pred`, `r_pred`, `col_ukl`, `r_ukl`, `col_p`, `r_p` FROM `rating_uk` order by `summ_r` ';
$c_r=0;
$q_r=mysql_query ($t_q_r)or die (Mysql_error());
while ($r_q_r = mysql_fetch_row($q_r))
 { 
 $c_r++;
$tab=$tab.'<tr><td height="115" width="46">'.$c_r.'</td>
    <td width="78">'.iconv("utf-8","windows-1251",$r_q_r[1]).'</td>
    <td width="324">'.iconv("utf-8","windows-1251",$r_q_r[2]).'</td>
    <td width="126">'.iconv("utf-8","windows-1251",$r_q_r[3]).'</td>
    <td width="106">'.iconv("utf-8","windows-1251",$r_q_r[4]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[5]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[6]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[7]).'</td>
        <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[8]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[9]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[10]).'</td>
    <td width="109">'.iconv("utf-8","windows-1251",$r_q_r[11]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[12]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[13]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[14]).'</td>
    <td width="111">'.iconv("utf-8","windows-1251",$r_q_r[15]).'</td>
  </tr>';
 }
 $tab=$tab.'</table>';
echo $tab;

?>