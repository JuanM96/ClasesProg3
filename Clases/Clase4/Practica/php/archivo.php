<?php
$destinoUp = "../uploads/".$_FILES['archivo']['name'];
$backup = "../backup/".date("d m y")."-".$_FILES['archivo']['name'];
if(!file_exists($destinoUp))
{
    move_uploaded_file($_FILES["archivo"]["tmp_name"], $destinoUp);
    echo "<img src=".$destinoUp.">";
}
else
{
    copy($destinoUp,$backup);
    
    move_uploaded_file($_FILES["archivo"]["tmp_name"], $destinoUp);
}
?>