<?php

include('db.php');

$api_picanova = $_POST['api_picanova'];
$api_upscale = $_POST['api_upscale'];
$api_dalle = $_POST['api_dalle'];

$query = "UPDATE preferencias SET `id`= null,`preferencia`= 'key_picanova',`valor`='$api_picanova' FROM preferencias WHERE preferencia = 'key_picanova'";
$result = mysqli_query($con, $query);

$query = "UPDATE preferencias SET `id`= null,`preferencia`= 'key_upscale',`valor`='$api_picanova' FROM preferencias WHERE preferencia = 'key_upscale'";
$result = mysqli_query($con, $query);

$query = "UPDATE preferencias SET `id`= null,`preferencia`= 'key_dalle',`valor`='$api_picanova' FROM preferencias WHERE preferencia = 'key_dalle'";
$result = mysqli_query($con, $query);








?>