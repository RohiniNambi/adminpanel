
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
$slabDetails = $scaffold->getPSlabDetails($sid);
$categoryList = $scaffold->getScaffoldList();
$catTypeIdList = array();
foreach($categoryList as $det){
	$catTypeIdList[$det["id"]] = $det["scaffoldName"];
}

$subcategoryList = $scaffold->getScaffoldSubCategoryList();
$subcatTypeIdList = array();
foreach($subcategoryList as $sdet){
	$subcatTypeIdList[$sdet["scaffoldSubCateId"]] = $sdet["scaffoldSubCatName"];
}

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
	<title>:: Edit Productivity SLAB::</title>
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
	
<div></div><strong class="bigtxt">Edit Productivity SLAB</strong></div>
	<div align="center">
		<br>
            <form name="frmuser" id="frmuser" method="post" action="productivityslabaction.php">
		<input type="hidden" name="hAct" value="2">
		<input type="hidden" name="createdBy" value="<?php echo trim($session_id);?>">
		<input type="hidden" name="sid" value="<?php echo $_GET['ac'];?>">        
                <div class="mediumtxt boldtxt errortxt" align="center"><?php echo $error;?></div>
	        <div class="mediumtxt boldtxt successtxt" align="center"><?php echo $success;?></div>
                <table cellpadding="0" cellspacing="0" border="0" class="mediumtxt" width="400px;">			
                    <tr>	
			    <td colspan="2"></td>
                            <td>&nbsp;</td>				
                    </tr>
                    <tr>
                    	
                            <td align="right">Scaffold Type<strong style="color:#FE1100;padding-left:5px;"></strong></td>
                            <td>:</td>
                            <td><select disabled="disabled" name="typeId" id="typeId" onchange="return loadSubcategory(this.value);">
                            	<option value="">-Select-</option>
                            	<?php foreach($catTypeIdList as $key=>$val){ ?>
                            		<option <?php if($slabDetails['scaffoldType'] == $key) echo "selected";  ?> value="<?php echo $key;?>"><?php echo $val;?></option>
                            	<?php }?>                                
						</select></td>
                    </tr>
                    <tr>
                            <td align="right">Scaffold Sub Category<strong style="color:#FE1100;padding-left:5px;"></strong></td>
                            <td>:</td>
                            <td><select disabled="disabled" name="subCatId" id="subCatId" onchange="return chkUserType(this.value);">
                            	<option value="">-Select-</option>
                            	<?php foreach($subcatTypeIdList as $key=>$val){ ?>
                            		<option <?php if($slabDetails['scaffoldSubCategory'] == $key) echo "selected";?> value="<?php echo $key;?>"><?php echo $val;?></option>
                            	<?php }?>                                
						</select></td>
                    </tr>
                    <tr>
                            <td align="right">Units<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td><select name="unitId" id="unitId" onchange="return chkUserType(this.value);">
                            	<option value="">-Select-</option>
                            	<?php foreach($_UNITS as $key=>$val){ ?>
                            		<option <?php if($slabDetails['unit']==$key) echo "selected";?> value="<?php echo $key;?>"><?php echo $val;?></option>
                            	<?php }?>                                
						</select></td>
                    </tr>                    
                     <tr>
                            <td align="right">Erection<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            	<input type="text" name="erection" id="erection" style="width:200px;" maxlength="60" onkeypress="return allowNumeric(event);" value = "<?php echo $slabDetails['typeWorkErection'];?>">
                            </td>
                    </tr>                    <tr>
                            <td align="right">Dismantle<strong style="color:#FE1100;padding-left:5px;">*</strong></td>
                            <td>:</td>
                            <td>
                            	<input type="text" name="dismantle" id="dismantle" style="width:200px;" maxlength="60" onkeypress="return allowNumeric(event);" value = "<?php echo $slabDetails['typeWorkDismantle'];?>">
                            </td>
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
	<script type="text/javascript" src="js/ajax.js"></script>
	<script language="javascript" src="js/validate.js"></script>
	
	<script language="javascript">	
		var toValidateElem = {
			'typeId' : new Array('empty',true),
			'subCatId' : new Array('empty',true),
			'unitId' : new Array('empty',true),
			'erection' : new Array('empty',true),
			'dismantle' : new Array('empty',true)
		}
		var toDisplayError = {
			'empty' : 'Must not be empty'
		}
		var _formId = "frmuser";
		var _submitId = "sbnAddUser";

			function loadSubcategory(catId){
			$.ajax({
				type: "POST", url: 'productivityslabaction.php', data: "id="+catId+"&hAct=4",dataType: "JSON",
				success: function(data){
					optionHtml = '<option value="">-Select-</option>';
					if(data != 0){
						$.each(data, function(i, item){
							optionHtml = optionHtml+'<option value='+item.scaffoldSubCateId+'>'+item.scaffoldSubCatName+'</option>';
  						});
					}
					$("#subCatId").html(optionHtml);
				}
			});

		}
	</script>
	
</body>
</html>
