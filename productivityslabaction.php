<?php
include_once "./includes/class.scaffold.php";
if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}

$scaffold = new SCAFFOLD;
if($_POST['hAct'] == 1){	
	$userresp = $scaffold->createPSlab($_POST);
        $commonObj->RedirectTo('createproductivityslab.php?i='.$userresp);
}
elseif($_POST['hAct'] == 2){
        $userresp = $scaffold->editPSlab($_POST);
        $commonObj->RedirectTo('editproductivityslab.php?ac='.$_POST['sid'].'&i='.$userresp);
}
elseif($_POST['hAct'] == 3){
        echo $userresp = $scaffold->deletePSlab($_POST['id']);
}elseif($_POST['hAct'] == 4){
        echo $userresp = $scaffold->loadSubcatBasedCategory($_POST['id']);
}




?>