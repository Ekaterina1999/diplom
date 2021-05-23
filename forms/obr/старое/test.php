<html>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="test.js"></script>
</head>
<body>
<form name="form">
    <select name="l_city" id="l_city">
      <?
  include_once('query_form\query_in.php');
  list_city($s_city);
  echo $s_city;
  ?>
    </select>
</form>

<div id="res"></div><!--тут выведем ответ с сервера-->


</body>