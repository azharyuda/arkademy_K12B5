<?php
  function hitung($string, $karakter){
    $hasil = substr_count($string, $karakter);
    if($hasil == 0){
      echo "character $karakter is not found in string $string";
    }else{
      echo $hasil;
    }
    return;
  }
  hitung('arkademy','x');
 ?>
