
<?php
include_once "./includes/class.scaffold.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}

if($_GET['i'] == "1")
	$success = "Scaffold Created Successfully";
elseif($_GET['i'] == "2")
	$error = "Error!! Please try again";
elseif($_GET['i'] == "0")
	$error = "Scaffold name already exists.";	
$scaffold = new SCAFFOLD;
$categoryList = $scaffold->getScaffoldList();
$catTypeIdList = array();
foreach($categoryList as $det){
	$catTypeIdList[$det["id"]] = $det["scaffoldName"];
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Create Scaffold Sub Category::</title>
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
            <form name="frmuser" id="frmuser" method="post" action="scaffoldsubcategoryaction.php">
		<input type="hidden" name="hAct" value="1">
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>">         
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt">			
                    <tr>	
			    <td colspan="2"></td>
                            <td><strong class="bigtxt">Add Scaffold Sub Category</strong></td>				
                    </tr>
                    <tr>
                            <td align="right">Scaffold Sub Category Name<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtName" id="txtName" value="" style="width:250px;"></td>
                    </tr>
                    <tr>
                    	
                            <td align="right">Scaffold Type<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><select name="typeId" id="typeId" onchange="return chkUserType(this.value);">
                            	<option value="">-Select-</option>
                            	<?php foreach($catTypeIdList as $key=>$val){ ?>
                            		<option value="<?php echo $key;?>"><?php echo $val;?></option>
                            	<?php }?>                                
						</select></td>
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
	
	<script language="javascript" src="js/validate.js"></script>

	<script language="javascript">	
		var toValidateElem = {
			'txtName' : new Array('empty',true),
			'typeId' : new Array('empty',true),
		}
		var toDisplayError = {
			'empty' : 'Must not be empty'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";

		function chkUserType(e){document.getElementById("projectdiv")
			if(e.value == 5){
				document.getElementById("projectdiv").style.visibility="visible";

			}
			else{
				document.getElementById("projectdiv").style.visibility="hidden";
			}
		}
	</script>
	
</body>
</html>
