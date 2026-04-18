<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/designstyle.css"> 
    <script src="js/script.js"></script>
    <title>User Management System</title>
</head>
<body>

    <header class="top-navbar">
        <div class="nav-logos">
            <img src="Images/BulsuLOGO.jfif" alt="BulSU" class="logo-img round-logo">
            <img src="Images/CICTlogo.png" alt="CICT" class="logo-img round-logo">
            <img src="Images/AlabBulsu.jpg" alt="Alab" class="logo-img rect-logo">
        </div>
        <div class="nav-title">
            <span>User Management System</span>
        </div>
    </header>

    <div class="container">
        <h1>User Management</h1>
        
        <form action ="add.php" method="post" class="user-form">
            <input type="hidden" id="userId">

            <div class="form-group">
                <label>Student ID:</label>
                <input type="tel" name="IDNO" id="IDNO" required>
            </div>
            
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="NAME" id="NAME" required>
            </div>

             <div class="form-group">
                <label for="course">Course:</label>
                <input type="text" name="COURSE" id="COURSE" required>
            </div>

             <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="EMAIL" id="EMAIL" required>
            </div>

             <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" name="PHONE" id="PHONE" required>
            </div>

            <button type="submit" name="add">Add User</button>
            <button type="button" onclick="reloadPage()" id="reloadBtn" style="
                 background-color: firebrick;
                 padding: 10px 10px;
                 border-radius: 4px;
                 color: white;
                 border-style: none;
                 cursor: pointer;
                 margin-left: 5px;">Reload Form</button>
        </form>

        <table class="user-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
           <tbody> 
                  
                 <?php 
                   if(file_exists('names.xml')){
                    $xml = new DOMDocument();
                    $xml->Load('names.xml');
                    $x = $xml->getElementsByTagName('STUDENT');

                    foreach($x as $infos){
                         $id = $infos->getElementsByTagName('IDNO')->item(0)->nodeValue;
                         $name = $infos->getElementsByTagName('NAME')->item(0)->nodeValue;
                         $course = $infos->getElementsByTagName('COURSE')->item(0)->nodeValue;
                         $email = $infos->getElementsByTagName('EMAIL')->item(0)->nodeValue;
                         $number = $infos->getElementsByTagName('PHONE')->item(0)->nodeValue;
                         
                         echo "<tr>";
                         echo "<td>".$id."</td>";
                         echo "<td>".$name."</td>";
                         echo "<td>".$course."</td>";
                         echo "<td>".$email."</td>";
                         echo "<td>".$number."</td>";
                         echo "<td>
                            <button type='button' onclick=\"prepareEdit('".$id."', '".addslashes($name)."', '".$course."', '".$email."', '".$number."')\" class='btn-edit'>Edit</button>
                            <a href='delete.php?id=".urlencode($id)."' class='btn-delete' onclick='return confirm(\"Delete this student?\")'>Delete</a>
                         </td>";
                         echo "</tr>";
                    }
                   }
                 ?>
            </tbody>
        </table>
    </div>
</body>
</html>