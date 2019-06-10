<?php
include_once "./includes/class.scaffold.php";
if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}

$scaffold = new SCAFFOLD;
if($_POST['hAct'] == 1){	
	$userresp = $scaffold->createScaffoldSubCategory($_POST);
        $commonObj->RedirectTo('createscaffoldsubcategory.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $scaffold->editScaffoldSubCategory($_POST);
        $commonObj->RedirectTo('editscaffoldsubcategory.php?ac='.$_POST['sid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $scaffold->deleteScaffoldSubCategory($_POST['id']);
}



?>