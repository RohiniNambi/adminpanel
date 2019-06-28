
<?php
include_once "./includes/class.scaffold.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}
$sid = $commonObj->Decrypt($_GET['ac']);
$scaffold = new SCAFFOLD;
$scaffoldDetails = $scaffold->getScaffoldDetails($sid);

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
	<title>:: Edit Scaffold ::</title>
	<style>
		@import "css/style.css";
		@import "css/validate.css";		
	</style>

	<style>
	.multiple_chk {height: 140px; width:  250px; padding: 5px; overflow: auto; font-size:12px; border: 1px solid #ccc;}
	</style>

</head>
<body style="width: 250px">
<center>
	

	<div >
	<div>
	
<div></div><strong class="bigtxt">Edit Scaffold</strong></div>
	<div align="center">
		<br>
            <form name="frmuser" id="frmuser" method="post" action="scaffoldaction.php">
		<input type="hidden" name="hAct" value="2">
		<input type="hidden" name="sid" value="<?php echo $_GET['ac'];?>">        
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt" width="400px;">			
                    <tr>	
			    <td colspan="2"></td>
                            <td>&nbsp;</td>				
                    </tr>
                    <tr>
                            <td align="right">Name<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><?php echo $scaffoldDetails['scaffoldName'];?></td>
                    </tr>

                    <tr>
                            <td align="right">Status<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><select name="status" id="status" onchange="return chkUserType(this.value);">
                                    <option value="">-Select-</option>
					   				<option value="1" <?php if($scaffoldDetails['status'] == 1) echo "selected";?>>Active</option>
					   				<option value="2" <?php if($scaffoldDetails['status'] == 2) echo "selected";?>>Closed</option>
						</select></td>
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
			'txtName' : new Array('empty',true)
		}
		var toDisplayError = {
			'empty' : 'Must not be empty'
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
