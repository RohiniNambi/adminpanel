<?php
include_once "./includes/class.projects.php";

/*error_reporting(E_ALL);
ini_set(display_errors,1);*/

$contracts = new PROJECTS;
if($_POST['hAct'] == 1){	
	$userresp = $contracts->createContract($_POST);
        $commonObj->RedirectTo('createcontract.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $contracts->editContract($_POST);
        $commonObj->RedirectTo('editcontract.php?ac='.$_POST['wid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $contracts->deleteContract($_POST['id']);
}elseif($_POST['hAct'] == 4){
        echo $userresp = $contracts->loadClientBasedonPjts($_POST['id']);
}



?>