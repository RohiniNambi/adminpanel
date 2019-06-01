<?php
include_once "./includes/class.projects.php";

/*error_reporting(E_ALL);
ini_set(display_errors,1);*/

$projects = new PROJECTS;
if($_POST['hAct'] == 1){	
	$userresp = $projects->createProject($_POST);
        $commonObj->RedirectTo('createproject.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $projects->editProject($_POST);
        $commonObj->RedirectTo('editproject.php?ac='.$_POST['cid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $projects->deleteProject($_POST['id']);
}



?>