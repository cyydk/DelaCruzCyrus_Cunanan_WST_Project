<?php


 $id = $_POST['IDNO'];
 $name = $_POST['NAME'];
 $course = $_POST['COURSE'];
 $email = $_POST['EMAIL'];
 $phone = $_POST['PHONE'];

  $xml = new DOMDocument();
 
  $xml->load('names.xml');
  $students =$xml->getElementsByTagName('STUDENT');

  foreach($students as $student){
    $studentID = $student->getElementsByTagName('IDNO')->item(0)->nodeValue;
    if($studentID == $id){
      $oldStudent = $student;
    }
  }

     $update = $xml->createElement('STUDENT');
     $update->appendChild($xml->createElement('IDNO', $id));
     $update->appendChild($xml->createElement('NAME', $name));
     $update->appendChild($xml->createElement('COURSE', $course));
     $update->appendChild($xml->createElement('EMAIL', $email));
     $update->appendChild($xml->createElement('PHONE', $phone));

  $oldStudent->parentNode->replaceChild($update, $oldStudent);
  $xml->save('names.xml');

     echo"<script>
     alert('Student ID: $id successfully updated');
     window.location.href = 'main.php';
     </script>";
     exit();

header("Location: main.php");
?>