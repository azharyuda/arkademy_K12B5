<?php
  $link=mysqli_connect("localhost","root","","dbarka_2") or die (mysqli_error($link));
$id = $_GET['id'];
$hapus=$link->query("DELETE FROM tblname WHERE id='$id'");
echo "<meta http-equiv='refresh' content='0; url=index.php'/>";
?>
