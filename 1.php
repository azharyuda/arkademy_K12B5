<?php
function biodata($name,
$age,
$address,
$hobbies = [],
$is_married,
$school = [],
$skills = [],
$interest_in_coding)
{

  $bio = array(
    "name"=>$name,
    "age"=>$age,
    "address"=>$address,
    "hobbies"=>$hobbies,
    "is_married"=>$is_married,
    "school & major"=>$school = [
      'highSchool'=>$school[0],
      'Year In'=>$school[1],
      'year out'=>$school[2],
      'school major'=>$school[3],
      'University'=>$school[4],
      'univ. Year In'=>$school[5],
      'univ. year out'=>$school[6],
      'University Major'=>$school[7]

      ],
    "skills"=>$skills = [
      'name'=>$skills[0],
      'score'=>$skills[1]
      ],
      "interest in coding"=>$interest_in_coding
  );
  $hasil = json_encode($bio);
  return $hasil;
}
  $hasil = biodata('Azhar Yuda Partama', 23, 'Jl. Adam Malik Perumahan Citra Griya BLok A.15',
  ['menonton film','bermain game','membaca buku'],
  false,
  ['SMK TI Airlangga',
  2011,
  2014,
  'Rekayasa Perangkat Lunak',
  'STMIK Widya Cipta Dharma',
  2014,
  2018,
  'Sistem Informasi'],
  [['php','html','visual basic','office'],
  ['beginner','beginner','advance','advance']], true);
  echo $hasil;
 ?>
