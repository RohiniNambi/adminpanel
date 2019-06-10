
<?php
include_once "./includes/class.scaffold.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}
$uid = $commonObj->Decrypt($_GET['ac']);
$scaffold = new SCAFFOLD;
$gradeDetails = $scaffold->getGradeDetails($uid);
if($_GET['i'] == "1")
	$success = "Updated Successfully";
elseif($_GET['i'] == "2")
	// $error = "No records updated!! Please change any value and try again";
	$error = "Updated Successfully";


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Edit Grade ::</title>
	<style>
		@import "css/style.css";
		@import "css/validate.css";		
	</style>

	<style>
	.multiple_chk {height: 140px; width:  250px; padding: 5px; overflow: auto; font-size:12px; border: 1px solid #ccc;}
	</style>
<script type="text/javascript" src="js/common.js"></script>
</head>
<body style="width: 250px">
<center>
	

	<div >
	<div>
	
<div></div><strong class="bigtxt">Edit Grade</strong></div>
	<div align="center">
		<br>
            <form name="frmuser" id="frmuser" method="post" action="gradeaction.php">
		<input type="hidden" name="hAct" value="2">
		<input type="hidden" name="sid" value="<?php echo $_GET['ac'];?>">        
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>">
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt" width="400px;">			
                    <tr>	
			    <td colspan="2"></td>
                            <td>&nbsp;</td>				
                    </tr>
                    <tr>
                            <td align="right">Range<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtRange" id="txtRange" value="<?php echo $gradeDetails['gradeRange'];?>" style="width:250px;" onkeypress="return allowNumeric(event);"></td>
                            
                    </tr>
		     <tr>
                            <td align="right">Percentage</td>
                            <td>:</td>
                            <td><input type="text" name="txtPercent" id="txtPercent" value="<?php echo $gradeDetails['Percentage'];?>" style="width:250px;" onkeypress="return allowNumeric(event);"></td>
                    </tr>
                    <tr>
                            <td align="right">Grade<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtGrade" id="txtGrade" style="width:250px;" value="<?php echo $gradeDetails['grade']?>" onkeypress="return allowNumeric(event);"></td>
                    </tr>
                                   		    
                    <tr>
			    <td colspan="2"></td>
                            <td><input type="submit" name="sbnAddUser" id="sbnAddUser" value="Update" class="button"></td>				
                    </tr>
                </table>
            </form>		
	</div>
	</div>
	</div>


		
</center>
	<script language="javascript" src="js/jquery.js"></script>
	<script language="javascript" src="js/validate.js"></script>

	<script language="javascript">	
		var toValidateElem = {
			'txtRange' : new Array('empty',true),
			'txtPercent' : new Array('empty',true),
			'txtGrade' : new Array('empty',true)
		}
		var toDisplayError = {
			'empty' : 'Must not be empty',
			'email' : 'Invalid email'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";

			function chkUserType(e){
				
				val = document.getElementById("selUsertype").value;
			if(val == "5"){
			
				document.getElementById("projectdiv").style.visibility="visible";

			}
			else{
				document.getElementById("projectdiv").style.visibility="hidden";
			}
		}
	</script>
	
</body>
</html>
