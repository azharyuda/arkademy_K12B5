<?php
  function check($username){
    if(preg_match_all("/[a-zA-Z]$/", $username)==true){
      $pisah = str_split($username);
      if(is_numeric($pisah[0]) || is_numeric($pisah[1]) || is_numeric($pisah[2]) ||
         is_numeric($pisah[3]) || is_numeric($pisah[4]) || is_numeric($pisah[5])){
        echo "salah";
      }else{
      if(strlen($username)<>6){
        echo "salah";
      }else{
        echo "Benar";
      }
      return;
  }
}
}

function check2($password){
  if(preg_match_all("/[a-zA-Z1-9!@#$%^&*()_=]$/", $password)==true){
    $split=str_split($password);
    if($split[0]<>7){
      echo "salah";
    }else{
      if(preg_match('~[A-Z]~', $password) != true){
        echo "salah";
      }else{
      if(preg_match('~[0-9]~', $password)!= true){
        echo "salah";
      }else{
        if(preg_match('~[!@#$%^&*()_]~', $password)!=true){
          echo "salah";
        }else{
        if(strlen($password)<5){
          echo "salah";
        }else{
      echo "Benar";
    }
    return;
}
}
}
}
}
}

  $hasil = check('azhary');
  echo "<br />";
  $hasil2 = check2('7');

 ?>
