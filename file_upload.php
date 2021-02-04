<?php
if(!isset($_FILES['upfile']) || $_FILES['upfile']['error'] != 0) {
  exit('Error:画像が送信されていません');
} else {
$uploaded_file_name = $_FILES['upfile']['name'];
$temp_path = $_FILES['upfile']['tmp_name'];
$directory_path = 'upload/';

$extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
$unique_name = date('YmdHis') . md5(session_id()) . "." . $extension;
$filename_to_save = $directory_path . $unique_name;

  $img = '';
  if (!is_uploaded_file($temp_path)) {
    exit('Error:画像がありません');
  } else { 
    if (!move_uploaded_file($temp_path, $filename_to_save)) {
      exit('Error:アップロードできませんでした'); 
    } else {
      chmod($filename_to_save, 0644);
      $img = "<img src={$filename_to_save}>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>file_upload</title>
</head>

<body>
  <?= $img ?>
</body>

</html>