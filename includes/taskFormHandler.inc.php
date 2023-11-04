<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $projectId = 1;
    $taskName = $_POST["taskName"];
    $taskDueDate = $_POST["dueDate"];
    $taskAssignee = $_POST["members"];

    try {
        require_once "databaseHandler.inc.php";
        //Execute prepared SQL Statement:
        $query = "INSERT INTO tasks (projectId, taskName, taskDueDate, taskAssignee) VALUES (:projectId, :taskName, :taskDueDate, :taskAssignee);";
        $statement = $pdo->prepare($query);
        $statement->bindParam(":projectId", $projectId);
        $statement->bindParam(":taskName", $taskName);
        $statement->bindParam(":taskDueDate", $taskDueDate);
        $statement->bindParam(":taskAssignee", $taskAssignee);
        $statement -> execute();

        //Close Connection:
        $pdo = NULL;
        $statement = NULL;
        header("Location: ../projectpage.php"); //Send user back to project page
        die();
    } catch (PDOException $e) {
        die("Task Creation Failed: " . $e->getMessage());
    }
} else {
    //If user arrives at this file but not through the form, send themback to project page
    header("Location: ../projectpage.php");
}