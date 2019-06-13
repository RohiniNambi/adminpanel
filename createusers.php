
<?php
include_once "./includes/class.users.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}
$users = new USERS;
$projectList = $users->getActiveProjectList();

if($_GET['i'] == "1")
	$success = "User Created Successfully";
elseif($_GET['i'] == "2")
	$error = "Error!! Please try again";
elseif($_GET['i'] == "0")
	$error = "Username already exists.";	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Create User ::</title>
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
            <form name="frmuser" id="frmuser" method="post" action="useraction.php">
		<input type="hidden" name="hAct" value="1">
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>">         
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt">			
                    <tr>	
			    <td colspan="2"></td>
                            <td><strong class="bigtxt">Add User</strong></td>				
                    </tr>
                    <tr>
                            <td align="right">Name<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtName" id="txtName" value="" style="width:250px;"></td>
                    </tr>
		     <tr>
                            <td align="right">User Name<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtUsername" id="txtUsername" value="" style="width:250px;" autocomplete="off"></td>
                    </tr>
		      <tr>
                            <td align="right">Password<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="password" name="txtPassword" id="txtPassword" value="" style="width:250px;" autocomplete="off"></td>
                    </tr>
                                
                    <tr>
                            <td align="right">User Type<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                                <select name="selUsertype" id="selUsertype" onchange="return chkUserType(this);">
                                    <option value="">-Select-</option>
				    <?php
				    foreach($_USERTYPES as $key=>$values){
				    ?>
					   <option value="<?php echo $key?>"><?php echo $values?></option>
				
				    <?php }?>
                                </select>
                            </td>
                    </tr>
					<tr id="projectdiv">
                            <td align="right">Projects<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                                <select style="width:250px" name="selProjects[]" id="selProjects" multiple="multiple">
                         		<option value="0">-Select-</option>           
				    <?php
				    foreach($projectList as $key=>$values){
				    ?>
					   <option value="<?php echo $values["projectId"]?>"><?php echo $values["projectName"]?></option>
				
				    <?php }?>
                                </select>
                            </td>
                    </tr>
		    
					   
		    
                    <tr>
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
	


	<script language="javascript">	
		var toValidateElem = {
			'txtName' : new Array('empty',true),
			'txtUsername' : new Array('empty',true),
			'txtPassword' : new Array('empty',true),
			'txtEmail' : new Array('email',false),
			'selUsertype' : new Array('empty',true),
			'selProjects' : new Array('select',true, document.getElementById("selUsertype").value==5)
		}
		var toDisplayError = {
			'empty' : 'Must not be empty',
			'select' : 'Must not be empty',
			'email' : 'Invalid email'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";

		function chkUserType(e){
			if(e.value == 5){
				document.getElementById("projectdiv").style.visibility="visible";
				document.getElementById("selProjects").hidden=false;
			}
			else{
				document.getElementById("projectdiv").style.visibility="hidden";
				document.getElementById("selProjects").hidden=true;
				//document.getElementById("selProjectsInfo").hidden=true;
				if($('#selProjectsInfo').length >0){
					var Info = $('#selProjectsInfo');
					ele = $("#selProjects");
								console.log(ele);

					var pos = ele.offset();
					Info.css({
						top: pos.top-3,
						left: pos.left+ele.width()+15
					});
					Info.removeClass('error').addClass('correct').html('&radic;').hide();
					ele.removeClass('wrong').addClass('normal');
				}
				
			}
		}
	</script>
	<script language="javascript" src="js/validate.js"></script>	
</body>
</html>
