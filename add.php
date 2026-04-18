<?php

$id = $_POST['IDNO'];
$name = $_POST['NAME'];
$course = $_POST['COURSE'];
$email = $_POST['EMAIL'];
$phone = $_POST['PHONE'];


$xml = new DOMDocument();
$xml->Load('names.xml');

$students = $xml->getElementsByTagName('STUDENT');
$exists = false;

foreach($students as $student){
     $studentID = $student->getElementsByTagName('IDNO')->item(0)->nodeValue;
     if($studentID == $id){
          $exists = true;
          break;
     }
}


if($exists){

     echo"<script>
     alert('Student ID: $id already exist');
     window.location.href = 'main.php';
     </script>";
     
     exit();
} else {
  
   $info = $xml->createElement('STUDENT');
     $info->appendChild($xml->createElement('IDNO', $id));
     $info->appendChild($xml->createElement('NAME', $name));
     $info->appendChild($xml->createElement('COURSE', $course));
     $info->appendChild($xml->createElement('EMAIL', $email));
     $info->appendChild($xml->createElement('PHONE', $phone));

     $xml->getElementsByTagName('INFO')->item(0)->appendChild($info);
     $xml->save('names.xml');


    
 
   header("Location: main.php");
}

    

?>
