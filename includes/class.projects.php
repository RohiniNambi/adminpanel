<?php

include_once "./lib/init.php";

class PROJECTS
{
	public $common;

	function __construct(){
		global $commonObj;
		$this->common = $commonObj;
	}

	function getProjectList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("projectName","projectStatus","projectId");
		$whereClause = "projectStatus != 9";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["PROJECTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$projectInfo = $db->fetchArray($res[0],1);
			$returnval = $projectInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
 
		
	}

	function getActiveProjectList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("projectName","projectStatus","projectId");
		$whereClause = "projectStatus = 1";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["PROJECTS"],$selectFileds,$whereClause);
		
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

	function getProjectDetails($pid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("projectName","projectStatus","projectId");
		$whereClause = "projectId = $pid";
		$res=$db->select($dbCon,$DBNAME["LMS"],$TABLEINFO["PROJECTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$projectInfo = $db->fetchArray($res[0]);
			$returnval = $projectInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
	}

	function createProject($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon=$db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("projectName");
		$whereClause = "projectName = '".trim($postArr["txtName"])."' and projectStatus!=9";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["PROJECTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["projectName"]=trim($postArr["txtName"]);
			$insertArr["createdBy"]=trim($postArr["createdBy"]);
			$insertArr["createdOn"]= date("Y-m-d H:i:s");			
			
			$dbm = new DB;
			$dbcon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbcon2,$DBNAME["LMS"],$TABLEINFO["PROJECTS"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	
	
	function editProject($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "projectId = ".$this->common->Decrypt($postArr['cid']);
		$insertArr["projectName"]=trim($postArr["txtName"]);
		$insertArr["projectStatus"]=trim($postArr["projectStatus"]);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["PROJECTS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function deleteProject($uid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "projectId = ".$this->common->Decrypt($uid);
		
		$insertArr["projectStatus"]=9;
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["PROJECTS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function createClient($postArr){		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon=$db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("clientName");
		$whereClause = "clientName = '".trim($postArr["txtName"])."' and status!=9";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["CLIENTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["clientName"]=trim($postArr["txtName"]);			
			
			$dbm = new DB;
			$dbcon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbcon2,$DBNAME["LMS"],$TABLEINFO["CLIENTS"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }			
		}
		$db->dbClose();
		return $returnval;
	}
	function getClientList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("clientName","clientId","status");
		$whereClause = "status != 9";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["CLIENTS"],$selectFileds,$whereClause);
		
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

	function getClientDetails($cid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("clientName","clientId","status");
		$whereClause = "clientId = $cid";
		$res=$db->select($dbCon,$DBNAME["LMS"],$TABLEINFO["CLIENTS"],$selectFileds,$whereClause);
		
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

	function editClient($postArr){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "clientId = ".$this->common->Decrypt($postArr['cid']);
		$insertArr["clientName"]=trim($postArr["txtName"]);
		$insertArr["status"]=trim($postArr["status"]);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["CLIENTS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function deleteClient($cid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "clientId = ".$this->common->Decrypt($cid);
		
		$insertArr["status"]=9;
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["CLIENTS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function getContractsList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id, projectId","description","clientId","item","location","length","height","width");
		$whereClause = "id != 0";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$contracts = $db->fetchArray($res[0],1);
			$returnval = $contracts;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;	
	}

	function createContract($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon=$db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id");
		$whereClause = "projectId = '".trim($postArr["projectId"])."' and clientId='".trim($postArr['clientId'])."'";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$selectFileds,$whereClause);
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["projectId"]=trim($postArr["projectId"]);
			$insertArr["description"]=trim($postArr["txtName"]);
			$insertArr["clientId"]=trim($postArr["clientId"]);
			$insertArr["item"]=trim($postArr["txtItem"]);
			$insertArr["location"]=trim($postArr["txtLocation"]);
			$insertArr["length"]=trim($postArr["txtLength"]);
			$insertArr["height"]=trim($postArr["txtHeight"]);
			$insertArr["width"]=trim($postArr["txtWidth"]);			
			$insertArr["sets"]=trim($postArr["txtSets"]);			
			$dbm = new DB;
			$dbcon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbcon2,$DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	
	function editContract($postArr){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "id = ".$this->common->Decrypt($postArr['wid']);
		$insertArr["projectId"]=trim($postArr["projectId"]);
		$insertArr["clientId"]=trim($postArr["clientId"]);
		$insertArr["item"]=trim($postArr["txtItem"]);
		$insertArr["location"]=trim($postArr["txtLocation"]);
		$insertArr["length"]=trim($postArr["txtLength"]);
		$insertArr["height"]=trim($postArr["txtHeight"]);
		$insertArr["width"]=trim($postArr["txtWidth"]);
		$insertArr["description"]=trim($postArr["txtName"]);
		$insertArr["sets"]=trim($postArr["txtSets"]);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbcon,$DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function getContractDetails($cid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id, projectId","description","clientId","item","location","length","height","width","sets");
		$whereClause = "id = $cid";
		$res=$db->select($dbCon,$DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$contractInfo = $db->fetchArray($res[0]);
			$returnval = $contractInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
	}
	
	
	
	function deleteContract($cid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;		
		$whereClasue = "id = ".$this->common->Decrypt($cid);

		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["CONTRACTS"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
}

?>

