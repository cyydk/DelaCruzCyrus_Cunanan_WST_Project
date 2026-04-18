<?php 
 

$id = $_GET['id']?? '';
$xml = new DOMDocument();
$xml->Load('names.xml');
     
    
     $details =$xml->getElementsByTagName('STUDENT');

     foreach($details as $delete){
      $deleteID = $delete->getElementsByTagName('IDNO')->item(0)->nodeValue;
      
     if($deleteID == $id){
        $delete->parentNode->removeChild($delete);

         echo"<script>
         alert('Student ID: $id deleted successfully');
         window.location.href = 'main.php';
        </script>";
       $xml->save('names.xml');
        exit();
     }
     
     }

    
     
header("Location: main.php");

?>