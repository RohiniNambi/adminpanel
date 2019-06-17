<?php
include_once "./includes/class.scaffold.php";
if(trim($session_id) == ""){
	 $commonObj->RedirectTo('logout.php');
}

if(trim($session_type) != 1){
	echo "You do not have access this page.";
	exit;
}

$scaffold = new SCAFFOLD;
$scaffoldlist = $scaffold->getScaffoldList();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Scaffold Type ::</title>
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
		<a href="createscaffold.php"><input type="button" name="createuser" value="Create a Scaffold" class="button"></a>
		<br><br>
		<table cellpadding="1" cellspacing="1" border="0" bgcolor="#EEEEEE" width="100%" class="mediumtxt">
			<tr bgcolor="#EEEEEE">
				<th>&nbsp;</th>				
				<th>Scaffold Name</th>
				<th>Status</th>
				<th>Action</th>
				
			</tr>
			<?php

	
			if(count($scaffoldlist) > 0){
				$i=0;
			foreach($scaffoldlist as $scaffoldval){
				$i++;				
			?>
			<tr id="row_<?php echo $i?>" bgcolor="#FFFFFF">
				<td><?php echo $i?></td>				
				<td><?php echo $scaffoldval["scaffoldName"];?></td>
				<td><?php if($scaffoldval["status"] == 1) { echo "Active";} else{ echo "Closed";}?></td>				
                             
				<td><a href="#" onclick='_getBox("editscaffold.php?page=Edit&ac=<?php echo $commonObj->Encrypt($scaffoldval["id"]);?>","50%","50%")'><img src="images/edit.gif" border="0" alt="edit" title="Edit"></a> &nbsp;<!-- <a onclick='_getBox("viewuser.php?i={$userslist[$key].uid|base64_encode}","35%","75%")' href="javascript:void(0)"><img src="images/view.gif" border="0" alt="view" title="View"></a>&nbsp;-->&nbsp;<a href="javascript:void(0)" onclick="confimuser('<?php echo $commonObj->Encrypt($scaffoldval["id"]);?>','<?php echo $i?>');"><img src="images/close.gif" border="0" alt="Delete" title="Delete"></td>
				
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
				type: "POST", url: 'scaffoldaction.php', data: "id="+str[0]+"&hAct=3",
				complete: function(data){
					//$('#row_'+str[1]).hide('slow');
					location.reload();
        			return;
				}
			});
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
