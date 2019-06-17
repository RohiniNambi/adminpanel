<?php
include_once "./includes/class.scaffold.php";

if(trim($session_id) == ""){
	// $commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}

$grades = new SCAFFOLD;
$gradeslist = $grades->getGradesList();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Grade ::</title>
	<style>
		@import "css/style.css";		
		@import "css/tab.css";	
	</style>

	<script type="text/javascript" src="js/ajax.js"></script>	

</head>
<body>
	


<center>
	<div id="mainwrapper">
		<div id="wrapper">
		<?php include "template/header.php";?>
	<div align="center">
		
	        <form name="frmUser" id="frmUser" method="post">
		
		<input type="hidden" name="hdnAction" id="hdnAction">
			<br>
		<a href="creategrade.php"><input type="button" name="createuser" value="Create a Grade" class="button"></a>
		<br><br>
		<table cellpadding="1" cellspacing="1" border="0" bgcolor="#EEEEEE" width="100%" class="mediumtxt">
			<tr bgcolor="#EEEEEE">
				<th>&nbsp;</th>				
				<th>Percentage</th>
				<th>Grade</th>
				<th>Range From</th>
				<th>Range To</th>
				<th>Action</th>
				
			</tr>
			<?php

	
			if(count($gradeslist) > 0){
				$i=0;
			foreach($gradeslist as $gradeval){
				$i++;
			?>
			<tr id="row_<?php echo $i?>" bgcolor="#FFFFFF">
				<td><?php echo $i?></td>				
				<td><?php echo $gradeval["Percentage"];?></td>
		
				<td><?php echo $gradeval["grade"]?></td>
				<td><?php echo $gradeval["gradeRangeFrom"];?></td>
				<td><?php echo $gradeval["gradeRangeTo"];?></td>
				
                             
				<td><a href="#" onclick='_getBox("editgrade.php?page=Edit&ac=<?php echo $commonObj->Encrypt($gradeval["id"]);?>","50%","60%")'><img src="images/edit.gif" border="0" alt="edit" title="Edit"></a> &nbsp; &nbsp;<a href="javascript:void(0)" onclick="confimuser('<?php echo $commonObj->Encrypt($gradeval["id"]);?>','<?php echo $i?>');"><img src="images/close.gif" border="0" alt="Delete" title="Delete"></td>
				
			</tr>
			<?php
			}
			
		}
		else
		{?>
			<tr>
				<td colspan="8" align="center"><span class="mediumtxt boldtxt errortxt">No records found.</span></td>
			</tr>
		<?php }?>
		</table>
		
		</from>
	</div>
		<form name="delete">
			<input type="hidden" name="hAct" value="2">
			<input type="hidden" name="uid" value="">
		</form>
	<?php include "template/footer.php";?>
	</div>
	</div>
</center>


	<script type="text/javascript" src="js/fancybox.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<style>
		@import "css/fancybox.css";
	</style>
	<script type="text/javascript">
		
		function confimuser(id,rowid){
			confimationMsg('Are you sure you want to delete the user?','DeleteUser',id+"~~~~~"+rowid);
		}
		function DeleteUser(id){						
			str = id.split('~~~~~');
			$.ajax({
				type: "POST", url: 'gradeaction.php', data: "id="+str[0]+"&hAct=3",
				complete: function(data){
					//$('#row_'+str[1]).hide('slow');
					location.reload();
        			return;
				}
			});
		}
		
		function ifCheckedit()
		{
		ptr=document.frmUser;
		len=ptr.elements.length;
		var i=0,j=0;
		for(i=0; i<len; i++) {
		
			if (ptr.elements[i].name=='Del_Id[]')
			{	
				if(ptr.elements[i].checked==true)	   
				{
					 j=j+1;	
					 val=ptr.elements[i].value; 
		
				}
			}
		}
			if(j==0)
			{
				alert("Check the checkbox");	
				return false;
				
			}
			if(j>1)	
			{	
			alert("You can edit only one user at a time");	
			return false;
			}
			_getBox("createusers.php?page=Edit&i="+val);
						
                }
		
		
		function ifCheck(val)
		{
		var flag=false;
		for(i=0;i<document.frmUser.elements.length;i++)
		{		
			if(document.frmUser.elements[i].name=="Del_Id[]")
			{
				if(document.frmUser.elements[i].checked)
				{
					flag=true;	
					break;
				}
			}

		}	
		if(flag)
		{

			document.frmUser.hdnAction.value=val;
			document.frmUser.submit();
			return true;
		}

		else
		{
			alert("Select atleast one user");
			return false;

		}

              }
	      
	      function ShowFilterUser()
	      {
		if(document.frmUser.txtUserName.value=="")
		{
			alert("Please enter the User Name");
			document.frmUser.txtUserName.style.borderColor="red";
			document.frmUser.txtUserName.focus();
			return false;
		}
		document.frmUser.submit();
		return true;
	      }
	      
	      function SelectAll()
		{
			var p=document.frmUser;
			len=p.elements.length;
			if((document.frmUser.check_all.checked==true) )
			{
		 	 var i=0;	
			 for(i=0; i<len; i++)
			   {
			   if (p.elements[i].name=='Del_Id[]')
		           p.elements[i].checked=1;
	
			   }
                        }

			if((document.frmUser.check_all.checked==false) )
			{
		 	var i=0;
			  for(i=0; i<len; i++)
			  {
		  	  if (p.elements[i].name=='Del_Id[]')
			   p.elements[i].checked=0;

			}

                       }
		}
	      
	      function ShowAllUser()
	      {
		document.frmUser.txtUserName.value="";
		document.frmUser.submit();
		return true;
	      }
	
	</script>

</body>
</html>
