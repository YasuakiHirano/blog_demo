<?php
// uploadするディレクトリ
$upload_dir = './';

for ($i=0; $i < count($_FILES['file']['name']); $i++) {
  $uploadfile = $upload_dir . basename($_FILES['file']['name'][$i]);

  if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadfile)) {
      echo "successfully uploaded.<br>";
  } else {
      echo "upload faild<br>";
  }
}
