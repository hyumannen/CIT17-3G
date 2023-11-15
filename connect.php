<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "StudentRecord";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error){
        die("Connection Failed" . $conn -> connect_error);
    }

    $sql = "Select * from Student";
    $result = $conn -> query("$sql");


    if ($result){
        echo "<table>";
        echo "<tr>";
        echo "<th>ID Number: </th>";
        echo "</tr>";

        while ($row = $result -> fetch_assoc()){
            echo "<tr><td>" .$row["StudentID"] ."</td><td>"
            . "First Name: " .$row["FirstName"] ."<br>"
            . "Last Name: " .$row["LastName"] ."<br>"
            . "Birthdate: " .$row["DateOfBirth"] ."<br>"
            . "E-mail: " .$row["Email"] ."<br>"
            . "Phone Number: " .$row["Phone"] ."<br>"
            . "<br>";
            
        }
    }


    $sql = "Select * from Course";
    $result = $conn -> query("$sql");

    if ($result){
        while ($row = $result -> fetch_assoc()){
            echo "Course ID: " .$row["CourseID"] ."<br>"
            . "Course Name: " .$row["CourseName"] ."<br>"
            . "Credits: " .$row["Credits"] ."<br>"
            . "<br>";
        }
    }

    $sql = "Select * from Instructor";
    $result = $conn -> query("$sql");

    if ($result){
        while ($row = $result -> fetch_assoc()){
            echo "ID Number: " .$row["InstructorID"] ."<br>"
            . "First Name: " .$row["FirstName"] ."<br>"
            . "Last Name: " .$row["LastName"] ."<br>"
            . "E-mail: " .$row["Email"] ."<br>"
            . "Phone Number: " .$row["Phone"] ."<br>"
            . "<br>";
        }
    }

    $sql = "Select * from Enrollment";
    $result = $conn -> query("$sql");

    if ($result){
        while ($row = $result -> fetch_assoc()){
            echo "Enrollment ID: " .$row["EnrollmentID"] ."<br>"
            . "Student ID: " .$row["StudentID"] ."<br>"
            . "Course ID: " .$row["CourseID"] ."<br>"
            . "Enrollment Date: " .$row["EnrollmentDate"] ."<br>"
            . "Grade: " .$row["Grade"] ."<br>"
            . "<br>";
        }
    }

?>

</body>
</html>


