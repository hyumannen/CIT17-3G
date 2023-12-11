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

    function createTable($conn, $sql)
    {
        if ($conn->query($sql) === TRUE) 
        {
            echo "Table has been created successfully<br>";
        } else 
        {
            echo "Error creating table: " . $conn->error;
        }
    }

    $sql = "CREATE DATABASE BUGASTO; ";
    createTable($conn, $sql);

    $sql = "CREATE TABLE Student (
        StudentID INT PRIMARY KEY,
        FirstName VARCHAR(255),
        LastName VARCHAR(255),
        DateOfBirth DATE,
        Email VARCHAR(255),
        PhoneNumber VARCHAR(255)
    );";
    createTable($conn, $sql);
    

    $sql = "CREATE TABLE Course (
        CourseID INT PRIMARY KEY,
        CourseName VARCHAR(255),
        Credits INT
    );";

    createTable($conn, $sql);

    $sql = "CREATE TABLE Instructor (
        InstructorID INT PRIMARY KEY,
        FirstName VARCHAR(255),
        LastName VARCHAR(255),
        Email VARCHAR(255),
        PhoneNumber VARCHAR(255)
    );";

    createTable($conn, $sql);

    $sql = "CREATE TABLE Enrollment (
        EnrollmentID INT PRIMARY KEY,
        StudentID INT,
        CourseID INT,
        EnrollmentDate DATE,
        Grade INT,
        FOREIGN KEY (StudentID) REFERENCES Student(StudentID),
        FOREIGN KEY (CourseID) REFERENCES Course(CourseID)
    );";

    createTable($conn, $sql);
?>