<?php
function upload_image($image_name,$temp_name,$folder)
{
  $filetype=pathinfo($image_name,PATHINFO_EXTENSION);
  $newimage_name="IMG_".rand().".".$filetype;
  $destination=$folder.$newimage_name;
	move_uploaded_file($temp_name,$destination);
	return $newimage_name;
}
?>