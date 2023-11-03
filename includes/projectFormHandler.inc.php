<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $projectName = $_POST["projectName"];
    $projectDueDate = $_POST["dueDate"];

    try {
        require_once "databaseHandler.inc.php";
        //Execute prepared SQL Statement:
        $query = "INSERT INTO projects (projectName, projectDueDate) VALUES (:projectName, :projectDueDate);";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":projectName", $projectName);
        $statement->bindParam(":projectDueDate", $projectDueDate);
        $statement -> execute();

        //Close Connection:
        $pdo = NULL;
        $statement = NULL;
        header("Location: ../index.php"); //Send user back to main page
        die();
    } catch (PDOException $e) {
        die("Project Creation Failed: " . $e->getMessage());
    }
} else {
    //If user arrives at this file but not through the form, send themback to main page
    header("Location: ../index.php");
}