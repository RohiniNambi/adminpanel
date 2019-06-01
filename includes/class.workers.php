<?php

include_once "./lib/init.php";

class WORKERS
{
	public $common;

	function __construct(){
		global $commonObj;
		$this->common = $commonObj;
	}

	function getWorkerList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$selectFileds=array("workerId","workerName","teamId","createdOn");
		$whereClause = "status != 0";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["WORKERS"],$selectFileds,$whereClause);
		if($res[1] > 0){
			$campaignInfo = $db->fetchArray($res[0],1);
			$returnval = $campaignInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
 
		
	}

	function getWorkerTeamList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("teamid","teamName","status","createdOn");
		$whereClause = "teamid != 0";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$campaignInfo = $db->fetchArray($res[0],1);
			$returnval = $campaignInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
 
		
	}

	function getWorkerTeamDetails($tid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("teamid","teamName","createdOn","status");
		$whereClause = "teamid = $tid";
		$res=$db->select($dbCon,$DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$selectFileds,$whereClause);
		
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
	function getWorkerDetails($wid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("workerId","workerName","teamId","createdOn","status");
		$whereClause = "workerId = $wid";
		$res=$db->select($dbCon,$DBNAME["LMS"],$TABLEINFO["WORKERS"],$selectFileds,$whereClause);
		
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

	function createWorkers($postArr){		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon=$db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("workerId");
		$whereClause = "workerName = '".trim($postArr["txtName"])."' and teamId=".trim($postArr["teamId"]);
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["workerName"]=trim($postArr["txtName"]);
			$insertArr["teamId"]=trim($postArr["teamId"]);
			$insertArr["createdBy"]=trim($postArr["createdBy"]);
			$insertArr["modifiedOn"]= $insertArr["createdOn"]= date("Y-m-d H:i:s");

			$dbm = new DB;
			$dbcon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbcon2,$DBNAME["LMS"],$TABLEINFO["WORKERS"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	function createWorkerTeam($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon=$db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("teamid");
		$whereClause = "teamName = '".trim($postArr["txtName"]);
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["teamName"]=trim($postArr["txtName"]);
			$insertArr["createdOn"]=date("Y-m-d H:i:s");
			$dbm = new DB;
			$dbcon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbcon2,$DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$insertArr,1,2);
			
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}

	function editWorkerTeam($postArr){		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "teamid = ".$this->common->Decrypt($postArr['cid']);
		$insertArr["teamName"]=trim($postArr["txtName"]);
		//$insertArr["createdOn"]=trim($postArr["createdOn"]);

		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function editWorkers($postArr){		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "workerId = ".$this->common->Decrypt($postArr['wid']);
		$insertArr["workerName"]=trim($postArr["txtName"]);
		$insertArr["teamId"]=trim($postArr["teamId"]);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function deleteWorkers($wid){

		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;		
		$whereClasue = "workerId = ".$commonObj->Decrypt($wid);
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERS"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function deleteWorkersTeam($tid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;
		
		$whereClasue = "teamid = ".$commonObj->Decrypt($tid);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["WORKERTEAM"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
}

?>

