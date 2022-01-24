<?php
if(!empty($_GET['file1'])){
  $fileName = basename($_GET['file1']);
  $filePath = "file/PP20/".$fileName;

  if(!empty($fileName) && file_exists($filePath)) {

    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=$fileName");
    header('Content-Type: application/zip');
    header('Content-Transfer-Encoding: binary');
    
    readfile($filePath);
    exit;

  }
  else{
    echo "ไม่พบไฟล์ PP20";
  }
}
?>

<?php
if(!empty($_GET['file2'])){
  $fileName = basename($_GET['file2']);
  $filePath = "file/affidavit/".$fileName;

  if(!empty($fileName) && file_exists($filePath)) {

    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=$fileName");
    header('Content-Type: application/zip');
    header('Content-Transfer-Encoding: binary');
    
    readfile($filePath);
    exit;

  }
  else{
    echo "ไม่พบไฟล์ affidavit";
  }
}
?>

<?php 
if(!empty($_GET['file3'])){
  $fileName = basename($_GET['file3']);
  $filePath = "file/idcard_org/".$fileName;

  if(!empty($fileName) && file_exists($filePath)) {

    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename=$fileName");
    header('Content-Type: application/zip');
    header('Content-Transfer-Encoding: binary');
    
    readfile($filePath);
    exit;

  }
  else{
    echo "ไม่พบไฟล์ idcard_org";
  }
}

?>