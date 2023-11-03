<?php
    //Create query to show all projects in database
        try {
            require_once "includes/databaseHandler.inc.php";
            //Execute prepared SQL Statement:
            $query = "SELECT projectName, projectDueDate FROM projects;";
            $statement = $pdo->prepare($query);
            $statement -> execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            //Close Connection:
            $pdo = NULL;
            $statement = NULL;
        } catch (PDOException $e) {
            die("Existing Project Query Failed: " . $e->getMessage());
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Default HTML Stuff -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link to CSS and JS: -->
    <link rel="stylesheet" href="homepage.css">
    <script src="app.js"></script>
    
    <!-- Tab Title: -->
    <title>Project Manager</title>
</head>
<body>
    <button id="createProjectButton" type="button" onclick="toggleProjectCreation()">Create Project</button>

    <div id = "existingProjects">
        <h2>Existing Projects</h2>

        <?php
            if(empty($results)){
                echo "<p>You have no existing projects!</p>";
            }else{
                //var_dump($results); //Raw results from query
                echo "<ul id = 'existingProjectsList'>";
                foreach($results as $row){
                    echo "<li>";
                    echo htmlspecialchars($row["projectName"]);
                    echo ",  Due: ";
                    echo htmlspecialchars($row["projectDueDate"]);
                    echo "</li>";
                }
                echo "</ul>";
            }
        ?>

        <ul id = 'existingProjectsList'>
            <li><a href="projectpage.html">Project 1</a></li>
            <li><a href="projectpage.html">Project 2</a></li>
            <li><a href="projectpage.html">Project 3</a></li>
        </ul>
    </div>

    <div id="createProjectTab" class="createProject">
        <h2>Create New Project</h2>

        <p>Please fill out project information:</p>

        <form action="includes/projectFormHandler.inc.php" method="post">
            <label>Name:</label>
            <input type="text" name="projectName" placehloder="Name">
            <br><br>
            <label>DueDate:</label>
            <input type="date" name="dueDate" onClick="dateAssigned()">
            <br><br>
            <button>Create Project</button>
            <br><br>
        </form>

        <label for="title">Title:</label>
        <input type="text" id="title"><br><br>

        <!-- this is a calendar input system to add a due date to your task. 
            You click the desired date on the calendar to assign it -->
        <form name="dueDate">

            <label for="ddate">Due Date:</label>
            <input type="date" id="dDate" name="dDate" onClick="dateAssigned()">
            <br><br>

        </form>

        <p>Choose a priority level (1 - highest priority, 5 - lowest priority):</p>
        <!-- use 5 radio buttons to assign a priority to the task.
        only one radio button can be selected at a time -->
        <form name="priority">

            <input type="radio" id="1" name="priority" value="1">
            <label for="1">1</label><br>
            <input type="radio" id="2" name="priority" value="2">
            <label for="2">2</label><br>
            <input type="radio" id="3" name="priority" value="3">
            <label for="3">3</label><br>
            <input type="radio" id="4" name="priority" value="4">
            <label for="4">4</label><br>
            <input type="radio" id="5" name="priority" value="5">
            <label for="5">5</label><br>

        </form>


        <button id="closeCreateProjectButton" type="button" onclick="createProjectLink(); toggleProjectCreation();">Done</button>
    </div>

</body>
</html>
