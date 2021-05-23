
			<ul>
				<p>
				
  <!-- CSS Tabs -->
  <?php
  $id_menu="";
include_once("link\link.php");
 $q1  =  mysql_query(   'SELECT id_menu FROM link_menu_workers where id_workers="'.$_COOKIE['userid'].'" ORDER BY  id_menu' );
if ( !$q1) echo "У вас нет прав. Обратитесь к администратору "  ;
else 
while ( $row1 = mysql_fetch_row($q1) )
{
if ($row1[0]==""){}else{
if($id_menu==""){$id_menu='"'.$row1[0].'"';} else{$id_menu=$id_menu.', "'.$row1[0].'"';}
}

} 
 if ($id_menu==""){} else{ 
  echo '<form id="menu_f" name="m_f">';


//if($_POST[LogInSist]>0){
$result  =  mysql_query(   'SELECT link_menu, name, id_load_main_page FROM menu_form where id_menu in('.$id_menu.')  ORDER BY  id_menu' );

if ( !$result ) echo "Произошла ошибка В запросе: "  .  mysql_error();
else 
while ( $row = mysql_fetch_row($result) )
{
$i++;
echo '<li>
<input type="button" name="menu_butt'.$i.'" value="'.$row[1].'" class="button_menu" onclick="load_menu('."'".$row[0]."'".')" /></li>';

}
/*}
else
{echo "&#1055;&#1086;&#1078;&#1072;&#1083;&#1091;&#1081;&#1089;&#1090;&#1072;, &#1072;&#1074;&#1090;&#1086;&#1088;&#1080;&#1079;&#1080;&#1088;&#1091;&#1081;&#1090;&#1077;&#1089;&#1100;!!! ";}*/

			echo  '</form> ';
			  } ?></p>
			</ul>
