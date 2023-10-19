function toggleProjectCreation(){
    if (document.getElementById('createProjectTab').classList.contains('createProject--active')){
        //If setting tab is open, close it
        document.getElementById('createProjectTab').classList.remove('createProject--active')
    }else{
        //Else open it
        document.getElementById('createProjectTab').classList.add('createProject--active')
    }
}