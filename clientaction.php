<?php
include_once "./includes/class.projects.php";

/*error_reporting(E_ALL);
ini_set(display_errors,1);*/

$projects = new PROJECTS;
if($_POST['hAct'] == 1){	
	$userresp = $projects->createClient($_POST);
        $commonObj->RedirectTo('createclient.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $projects->editClient($_POST);
        $commonObj->RedirectTo('editclient.php?ac='.$_POST['cid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $projects->deleteClient($_POST['id']);
}



?>