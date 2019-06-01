<?php
include_once "./includes/class.workers.php";

/*error_reporting(E_ALL);
ini_set(display_errors,1);*/

$workers = new WORKERS;
if($_POST['hAct'] == 1){	
	$userresp = $workers->createWorkerTeam($_POST);
        $commonObj->RedirectTo('createworkersteam.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $workers->editWorkerTeam($_POST);
        $commonObj->RedirectTo('editworkersteam.php?ac='.$_POST['cid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $workers->deleteWorkersTeam($_POST['id']);
}



?>