<?php

include_once "./includes/class.projects.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

$contracts = new PROJECTS;
$projectlist = $contracts->getProjectList();
$projectNameList = array();
foreach($projectlist as $value){
    $projectNameList[$value["projectId"]]=$value["projectName"];
}

if($_GET['i'] == "1")
	$success = "Client Created Successfully";
elseif($_GET['i'] == "2")
	$error = "Error!! Please try again";
elseif($_GET['i'] == "0")
	$error = "Client name already exists.";	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Create Client ::</title>
	<style>
		@import "css/style.css";
		@import "css/validate.css";		
	</style>

	<style>
	.multiple_chk {height: 140px; width:  250px; padding: 5px; overflow: auto; font-size:12px; border: 1px solid #ccc;}
	</style>

</head>
<body>
<center>
	

	<div id="mainwrapper">
	<div id="wrapper">
		<?php include "template/header.php"; ?>

	<div align="center">
		<br>
            <form name="frmuser" id="frmuser" method="post" action="clientaction.php">
		<input type="hidden" name="hAct" value="1">   
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>">      
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt">			
                    <tr>	
			    <td colspan="2"></td>
                            <td><strong class="bigtxt">Add Client</strong></td>				
                    </tr>
                   
                    <tr>
                            <td align="right">Client Name<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtName" id="txtName" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Type<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtType" id="txtType" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                     <tr>
                            <td align="right">Project<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            <select name="projectId[]" id="projectId" style="width:250px;" multiple="multiple">
                                    <option value="">-Select-</option>
								    <?php foreach($projectNameList as $key=>$values){
								     ?>
									   <option value="<?php echo $key;?>"><?php echo $values;?></option>							
								    <?php }?>
                            	</select>
                    </tr>

                    <tr>
                            <td align="right">Address<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtAddr" id="txtAddr" value="" style="width:250px;" maxlength="60"></td>
                    </tr>

                    <tr>
                            <td align="right">Tel-1<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtTel" id="txtTel" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Fax<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtFax" id="txtFax" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Attn1<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtAttn" id="txtAttn" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Email Address 1<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtEmail1" id="txtEmail1" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">HP/DID#<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtDid" id="txtDid" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Attn2<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtAttn2" id="txtAttn2" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Email Address 2<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtEmail2" id="txtEmail2" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">HP/DID#<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtDid2" id="txtDid2" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                   
			    <td colspan="2"></td>
                            <td><input type="submit" name="sbnAddUser" id="sbnAddUser" value="Submit" class="button"></td>				
                    </tr>
                </table>
            </form>		
	</div>
	

	<?php include "template/footer.php";?>
	</div>
	</div>


		
</center>
	
	<script language="javascript" src="js/validate.js"></script>

	<script language="javascript">	
		var toValidateElem = {
			'txtName' : new Array('empty',true),
			'projectId' : new Array('select', true),
			'txtType' : new Array('empty',true),
			'txtAddr' : new Array('empty',true),
			'txtTel' : new Array('empty',true),
			'txtFax' : new Array('empty',true),
			'txtAttn' : new Array('empty',true),
			'txtEmail1' : new Array('empty',true),
			'txtDid' : new Array('empty',true),
			'txtAttn2' : new Array('empty',true),
			'txtEmail2' : new Array('empty',true),
			'txtDid2' : new Array('empty',true)

		}
		var toDisplayError = {
			'empty' : 'Must not be empty',
			'select' : 'Must not be empty'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";
	</script>
	
</body>
</html>
