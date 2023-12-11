<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
    <title>A Web Page</title>
</head>
    <body>

    <h1>Create</h1>
    <br>
    <form method="post">
        <input type="text" id="sql" name="sql" size="80"/><br>
        <input type="submit" name="make" value="Submit"/>
    </form>

    <h1>Read</h1>
    <br>
    <form method="post">
    <select name="readChoices" id="readChoices">
        <option value="users">users</option>
        <option value="Student">students</option>
        <option value="course">course</option>
        <option value="instructor">instructor</option>
        <option value="enrollment">enrollment</option>
    </select>
    <input type="submit" name="get" value="Submit"/>
    </form>

    <h1>Update</h1>
    <br>
    <form method="post">
        <input type="text" id="sql" name="sql" size="80"/><br>
        <input type="submit" name="modernize" value="Submit"/>
    </form>

    <h1>Delete</h1>
    <br>
    <form method="post">
        <input type="text" id="sql" name="sql" size="80"/><br>
        <input type="submit" name="remove" value="Submit"/>
    </form>
    
    <?php
        $hostname = "localhost";
        $username = "root";
        $password ="";
        $databaseName ="Student Record";

        $conn = new mysqli($hostname, $username, $password, $databaseName);

        if ($conn->connect_error)
        {
            die("Conection Failed");
        }

        if(isset($_POST['make']))
        {
            $sql = $_POST['sql'];

            if ($conn->query("$sql") == TRUE) {
                echo "Record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if(isset($_POST['get']))
        {
            
            
            $columnLines = 0;
            $columnNames = array();
            $selected = $_POST['readChoices'];
            $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$selected'";
            $result = $conn->query("$sql");
            echo '<h1>Table</h1><br>';
            echo '<br><table>';
            echo "<tr>";
            while($row=$result->fetch_assoc())
            {
                echo "<th>" .$row["COLUMN_NAME"] ."</th>"; 
                $columnLines = $columnLines + 1;
                $columNames[] = $row["COLUMN_NAME"];
            }
            echo "</tr>";

            $sql = "SELECT * FROM $selected";
            $result = $conn->query("$sql");
            
            while($row=$result->fetch_assoc())
            {
                echo "<tr>";
                for ($x = 0; $x < $columnLines; $x++) 
                {
                    echo "<th>" .$row[$columNames[$x]] ."</th>"; 
                } 
                echo "</tr>";
            }
        }

        if(isset($_POST['modernize']))
        {
            $sql = $_POST['sql'];

            if ($conn->query("$sql") == TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        if(isset($_POST['remove']))
        {
            $sql = $_POST['sql'];

            if ($conn->query("$sql") == TRUE) {
                echo "Record removed successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    ?>
    </body>
</html>