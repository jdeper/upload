<?php
$uploads_dir = './files';
if(!is_dir($uploads_dir)) mkdir($uploads_dir, 0755);
$tmp_name = $_FILES["file"]["tmp_name"];
$name = $_FILES["file"]["name"];
move_uploaded_file($tmp_name, "$uploads_dir/$name");
echo $name;
?>