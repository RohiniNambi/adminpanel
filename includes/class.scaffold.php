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
			$insertArr["status"]='1';

			$dbm = new DB;
			$dbCon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbCon2, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDTYPE"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	
	function editScaffold($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$whereClasue = "id = ".$this->common->Decrypt($postArr['sid']);
		//$insertArr["scaffoldName"]=trim($postArr["txtName"]);
		$insertArr["status"]=trim($postArr["status"]);
		
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

	function getScaffoldSubCategoryList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("scaffoldSubCateId","scaffoldTypeId","scaffoldSubCatName");
		$whereClause = "scaffoldSubCateId != 0";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$selectFileds,$whereClause);
	
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

	function loadSubcatBasedCategory($cid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("scaffoldSubCateId","scaffoldTypeId","scaffoldSubCatName");
		$whereClause = "scaffoldTypeId = ".$cid." and scaffoldSubCateId != 0";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$selectFileds,$whereClause);
	
		if($res[1] > 0){
			$userInfo = $db->fetchArray($res[0],1);
			$returnval = $userInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		echo json_encode($returnval);
	}

	function createScaffoldSubCategory($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("scaffoldSubCateId");
		$whereClause = "scaffoldSubCatName = '".trim($postArr["txtName"])."' and scaffoldTypeId = '".trim($postArr["typeId"])."'";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$selectFileds,$whereClause);
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["scaffoldSubCatName"]=trim($postArr["txtName"]);
			$insertArr["scaffoldTypeId"]=trim($postArr["typeId"]);
			$insertArr["createdBy"]= $insertArr["modifiedBy"]=trim($postArr["createdBy"]);


			$dbm = new DB;
			$dbCon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbCon2, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}

	function getScaffoldSubCategoryDetails($sid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("scaffoldSubCateId","scaffoldTypeId","scaffoldSubCatName");
		$whereClause = "scaffoldSubCateId = $sid";
		$res=$db->select($dbcon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$selectFileds,$whereClause);
		
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

	function editScaffoldSubCategory($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$dbm = new DB;
		$dbCon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);

		$selectFileds=array("scaffoldSubCateId");
		$whereClause = "scaffoldSubCatName = '".trim($postArr["txtName"])."' and scaffoldTypeId = '".trim($postArr["typeId"])."' and scaffoldSubCateId != '".$this->common->Decrypt($postArr['sid'])."'";
		$res=$dbm->select($dbCon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$selectFileds,$whereClause);
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$whereClasue = "scaffoldSubCateId = ".$this->common->Decrypt($postArr['sid']);
			$insertArr["scaffoldSubCatName"]=trim($postArr["txtName"]);
			//$insertArr["scaffoldTypeId"]=trim($postArr["typeId"]);
			$insertArr["modifiedBy"]=trim($postArr["createdBy"]);
			
			$insid = $dbm->update($dbCon, $DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$insertArr,$whereClasue);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }

		}		
		return $returnval;
	}
	
	function deleteScaffoldSubCategory($sid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;
		
		$whereClasue = "scaffoldSubCateId = ".$commonObj->Decrypt($sid);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["SCAFFOLDSUBCATEGORY"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function getGradesList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id","gradeRangeFrom","gradeRangeTo", "Percentage","grade");
		$whereClause = "id != 0";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["GRADE"],$selectFileds,$whereClause);
	
		if($res[1] > 0){
			$gradeInfo = $db->fetchArray($res[0],1);
			$returnval = $gradeInfo;
		}
		else{
			$returnval = 0; 
		}
		$db->dbClose();
		
		return $returnval;
	}

	function createGrade($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$selectFileds=array("id");
		$whereClause = "gradeRangeFrom <= '".trim($postArr["txtRangeFrom"])."' and gradeRangeTo >='".trim($postArr["txtRangeTo"])."'";
		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["GRADE"],$selectFileds,$whereClause);
		
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["gradeRangeFrom"]=trim($postArr["txtRangeFrom"]);
			$insertArr["gradeRangeTo"]=trim($postArr["txtRangeTo"]);
			$insertArr["Percentage"]=trim($postArr["txtPercent"]);
			$insertArr["grade"]=trim($postArr["txtGrade"]);
			$insertArr["createdBy"]= $insertArr["modifiedBy"]=trim($postArr["createdBy"]);

			$dbm = new DB;
			$dbCon2 =$dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbCon2, $DBNAME["LMS"],$TABLEINFO["GRADE"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}

	function getGradeDetails($sid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$selectFileds=array("id","gradeRangeFrom","gradeRangeTo", "Percentage","grade");
		$whereClause = "id = $sid";
		$res=$db->select($dbcon, $DBNAME["LMS"],$TABLEINFO["GRADE"],$selectFileds,$whereClause);
		
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

	function editGrade($postArr){	
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		
		$whereClasue = "id = ".$this->common->Decrypt($postArr['sid']);
		//$insertArr["gradeRangeFrom"]=trim($postArr["txtRangeFrom"]);
		//$insertArr["gradeRangeTo"]=trim($postArr["txtRangeTo"]);
		$insertArr["Percentage"]=trim($postArr["txtPercent"]);
		$insertArr["grade"]=trim($postArr["txtGrade"]);
		$insertArr["modifiedBy"]=trim($postArr["createdBy"]);
		$dbm = new DB;
		$dbCon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbCon, $DBNAME["LMS"],$TABLEINFO["GRADE"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }		
		return $returnval;
	}
	
	function deleteGrade($sid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;
		
		$whereClasue = "id = ".$commonObj->Decrypt($sid);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["GRADE"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}

	function getPSlabList(){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id","scaffoldType","scaffoldSubCategory", "unit", "typeWorkErection", "typeWorkDismantle");

		$whereClause = "id != 0";
		$res=$db->select($dbcon,$DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$selectFileds,$whereClause);
	
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

	function getPSlabDetails($sid){
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbcon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id","scaffoldType","scaffoldSubCategory", "unit", "typeWorkErection", "typeWorkDismantle");

		$whereClause = "id = $sid";
		$res=$db->select($dbcon, $DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$selectFileds,$whereClause);
		
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



	function createPSlab($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$db = new DB;
		$dbCon = $db->connect('S',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		
		$selectFileds=array("id");
		$whereClause = "scaffoldType = '".trim($postArr["typeId"])."' and scaffoldSubCategory='".trim($postArr["subCatId"])."'";

		$res=$db->select($dbCon, $DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$selectFileds,$whereClause);
		if($res[1] > 0){
			$returnval = 0;
		}else{
			$insertArr["scaffoldType"]=trim($postArr["typeId"]);
			$insertArr["scaffoldSubCategory"]=trim($postArr["subCatId"]);
			$insertArr["unit"]=trim($postArr["unitId"]);
			$insertArr["typeWorkErection"]=trim($postArr["erection"]);
			$insertArr["typeWorkDismantle"]=trim($postArr["dismantle"]);
			$insertArr["createdBy"]= $insertArr["modifiedBy"] = trim($postArr["createdBy"]);

			$dbm = new DB;
			$dbCon2 = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
			$insid = $dbm->insert($dbCon2, $DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$insertArr,1,2);
			$dbm->dbClose();
			if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
			
		}
		$db->dbClose();
		return $returnval;
	}
	
	function editPSlab($postArr){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME;
		$whereClasue = "id = ".$this->common->Decrypt($postArr['sid']);

		$insertArr["scaffoldType"]=trim($postArr["typeId"]);
		$insertArr["scaffoldSubCategory"]=trim($postArr["subCatId"]);
		$insertArr["unit"]=trim($postArr["unitId"]);
		$insertArr["typeWorkErection"]=trim($postArr["erection"]);
		$insertArr["typeWorkDismantle"]=trim($postArr["dismantle"]);
		$insertArr["modifiedBy"] = trim($postArr["createdBy"]);

		$dbm = new DB;
		$dbCon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->update($dbCon, $DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$insertArr,$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}
	
	function deletePSlab($sid){
		
		global $DBINFO,$TABLEINFO,$SERVERS,$DBNAME,$commonObj;
		
		$whereClasue = "id = ".$commonObj->Decrypt($sid);
		
		$dbm = new DB;
		$dbcon = $dbm->connect('M',$DBNAME["LMS"],$DBINFO["USERNAME"],$DBINFO["PASSWORD"]);
		$insid = $dbm->delete($dbcon,$DBNAME["LMS"],$TABLEINFO["PRODUCTIVITYSLAB"],$whereClasue);
		$dbm->dbClose();
		if($insid == 0 || $insid == ''){ $returnval = 2; }else { $returnval = 1; }
		
		return $returnval;
	}


}

?>

