<?php
include_once "./includes/class.projects.php";

if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}


$contracts = new PROJECTS;
$projectlist = $contracts->getProjectList();
$projectName = array();
foreach($projectlist as $value){
    $projectName[$value["projectId"]]=$value["projectName"];
}

$clientlist = $contracts->getClientList();
$clientName = array();
foreach($clientlist as $value){
    $clientName[$value["clientId"]]=$value["clientName"];
}

if($_GET['i'] == "1")
	$success = "Contract Created Successfully";
elseif($_GET['i'] == "2")
	$error = "Error!! Please try again";
elseif($_GET['i'] == "0")
	$error = "Contract already exists.";	


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Create Contract ::</title>
	<style>
		@import "css/style.css";
		@import "css/validate.css";		
	</style>

	<style>
	.multiple_chk {height: 140px; width:  250px; padding: 5px; overflow: auto; font-size:12px; border: 1px solid #ccc;}
	</style>
<script type="text/javascript" src="js/common.js"></script>
</head>
<body>
<center>
	

	<div id="mainwrapper">
	<div id="wrapper">
		<?php include "template/header.php"; ?>

	<div align="center">
		<br>
            <form name="frmuser" id="frmuser" method="post" action="contractsaction.php">
		<input type="hidden" name="hAct" value="1">         
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>"> 
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt">			
                    <tr>	
			    <td colspan="2"></td>
                            <td><strong class="bigtxt">Add Contract</strong></td>				
                    </tr>
                    <tr>
                            <td align="right">Project<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            	<select name="projectId" id="projectId" style="width:250px;" onchange="return loadClients(this.value);">
                                    <option value="">-Select-</option>
								    <?php foreach($projectlist as $key=>$values){ ?>
									   <option value="<?php echo $values["projectId"];?>"><?php echo $values["projectName"]?></option>
								
								    <?php }?>
                            	</select>
                        	</td>
                    </tr>
                    <tr>
                            <td align="right">Client<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><select name="clientId" id="clientId" style="width:250px;" value="" >
                                    <option value="">-Select-</option>
								    <?php foreach($clientlist as $key=>$values){ ?>
									   <option value="<?php echo $values["clientId"];?>"><?php echo $values["clientName"]?></option>
								
								    <?php }?>
                            	</select>
                            	</td>
                    </tr>
                    <tr>
                            <td align="right">Item<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            	<input type="text" name="txtItem" id="txtItem" value="" style="width:250px;" maxlength="60">
                            </td>
                    </tr>
                    <tr>
                            <td align="right">Location<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtLocation" id="txtLocation" value="" style="width:250px;" maxlength="60"></td>
                    </tr>
                    <tr>
                            <td align="right">Description<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtName" id="txtName" value="" style="width:250px;" maxlength="100"></td>

                    </tr>
                    <tr>
                            <td align="right">Length in meter(m)<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            	<input type="text" name="txtLength" id="txtLength" maxlength="10" value="" onkeypress="return allowNumeric(event);"></td>
                    </tr>
                    <tr>
                            <td align="right">Width in meter(m)<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtWidth" id="txtWidth" value="" style="width:250px;" maxlength="60" onkeypress="return allowNumeric(event);"></td>
                    </tr>   
                    <tr>
                            <td align="right">Height in meter(m)<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><input type="text" name="txtHeight" id="txtHeight" value="" style="width:250px;" maxlength="60" onkeypress="return allowNumeric(event);"></td>
                    </tr>
                    <tr>
                            <td align="right">Sets<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                                <input type="text" name="txtSets" id="txtSets" maxlength="10" value="<?php echo $contractDetail['sets']?>" onkeypress="return allowNumericNotdecimal(event);"></td>
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
			'txtLocation' : new Array('empty',true),
            'projectId' : new Array('empty',true),
			'clientId' : new Array('empty',true),
			'txtItem' : new Array('empty',true),
			'txtLength' : new Array('empty','is_number',true),
			'txtWidth' : new Array('empty','is_number',true),
			'txtHeight' : new Array('empty','is_number',true),
            'txtSets' : new Array('empty','is_number',true)
		}
		var toDisplayError = {
			'empty' : 'Must not be empty'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";
        function loadClients(pid){
            $.ajax({
                type: "POST", url: 'contractsaction.php', data: "id="+pid+"&hAct=4",dataType: "JSON",
                success: function(data){
                    optionHtml = '<option value="">-Select-</option>';
                    if(data != 0){
                        $.each(data, function(i, item){
                            optionHtml = optionHtml+'<option value='+item.clientId+'>'+item.clientName+'</option>';
                        });
                    }
                    $("#clientId").html(optionHtml);
                }
            });

        }
	</script>
	
</body>
</html>
