<?php

include_once "./lib/init.php";

class SCAFFOLD
{
	public $common;

	function __construct(){
		global $commonObj;
		$this->common = $commonObj;
	}

	function getScaffoldList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id","scaffoldName","status");
		$whereClause = "id != 0";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$selectFileds,$whereClause);
	
		if($res[1] > 0){
			$userInfo = $db->fetchArray($res[0],1);
			$returnval = $userInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
		
	}

	function getScaffoldDetails($sid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id","scaffoldName","status");
		$whereClause = "id = $sid";
		$res=$db->select($dbcon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$userInfo = $db->fetchArray($res[0]);
			$returnval = $userInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval; 
		
	}

	function createScaffold($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id");
		$whereClause = "scaffoldName = '".trim($postArr["txtName"])."'";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["scaffoldName"]=trim($postArr["txtName"]);

			$dbm = new DB;
			$dbCon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbCon2, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$insertArr,1,2);
			//pr($dbm);exit;
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	
	function editScaffold($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		
		$whereClasue = "id = ".$this->common->Decrypt($postArr['sid']);
		$insertArr["scaffoldName"]=trim($postArr["txtName"]);
		
		$dbm = new DB;
		$dbCon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbCon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function deleteScaffold($sid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;
		
		$whereClasue = "id = ".$commonObj->Decrypt($sid);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
}

?>

