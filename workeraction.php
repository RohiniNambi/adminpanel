<?php
include_once "./includes/class.workers.php";

/*error_reporting(E_ALL);
ini_set(display_errors,1);*/

$workers = new WORKERS;
if($_POST['hAct'] == 1){	
	$userresp = $workers->createWorkers($_POST);
        $commonObj->RedirectTo('createworkers.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $workers->editWorkers($_POST);
        $commonObj->RedirectTo('editworkers.php?ac='.$_POST['wid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $workers->deleteWorkers($_POST['id']);
}



?>