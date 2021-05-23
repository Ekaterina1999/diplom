<?
function clear_user_temp($user_id){
if (!mysql_query('SELECT * FROM obr_incoming_id'.$user_id.'_user')){}
else {mysql_query('droup table obr_incoming_id'.$user_id.'_user'}
if (!mysql_query('SELECT * FROM obr_obj_id'.$user_id.'_user')){}
else {mysql_query('droup table obr_obj_id'.$user_id.'_user'}}
echo 'SELECT * FROM obr_incoming_id'.$user_id.'_user';
?>