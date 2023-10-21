function toggleProjectCreation(){
    if (document.getElementById('createProjectTab').classList.contains('createProject--active')){
        //If setting tab is open, close it
        document.getElementById('createProjectTab').classList.remove('createProject--active')
    }else{
        //Else open it
        document.getElementById('createProjectTab').classList.add('createProject--active')
    }
}

function toggleTaskCreation(){
    if (document.getElementById('createTaskTab').classList.contains('createTask--active')){
        //If setting tab is open, close it
        document.getElementById('createTaskTab').classList.remove('createTask--active')
    }else{
        //Else open it
        document.getElementById('createTaskTab').classList.add('createTask--active')
    }
}

function createProjectLink(title){
    let projectList  = document.getElementById('existingProjectsList');
    let newItem = document.createElement('li');
    let title = document.getElementById('title');

    newItem.innerHTML = '<a href="projectpage.html">' + title.value + '</a>';
    projectList.appendChild(newItem);
}

function createTaskLink(){
    let taskList  = document.getElementById('existingTasksList');
    let newItem = document.createElement('li');
    let title = document.getElementById('title');
    let title = document.getElementById('dDate');
    let title = document.getElementById('assignTeam');

    newItem.innerHTML = '<a href="projectpage.html">' + title.value + '</a>  <p>Due Date:' + dDate.value + 'Members:' + assignTeam.value + '</p>';
    taskList.appendChild(newItem);
}
