<?php
include_once "./includes/class.projects.php";


if(trim($session_id) == ""){
	$commonObj->RedirectTo('logout.php');
}

if(trim($session_type) == 3){
	echo "You do not have access this page.";
	exit;
}
$projects = new PROJECTS;
$clientlist = $projects->getClientList();

$projectlist = $projects->getProjectList();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>:: Clients ::</title>
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
		<a href="createclient.php"><input type="button" name="createuser" value="Create Client" class="button"></a>
		<br><br>
		<table cellpadding="1" cellspacing="1" border="0" bgcolor="#EEEEEE" width="100%" class="mediumtxt">
			<thead>
			<tr bgcolor="#EEEEEE">
				<th>&nbsp;</th>				
				<th>Client Name</th>
				<th>Status</th>
			
				<th>Action</th>
				
			</tr>
		</thead>
		<tbody id="myDIV">
			<tr bgcolor="#FFFFFF" class="srch">
				<td>&nbsp;</td>
				<td><input type="text" placeholder="Search Client.." id="clientsearchFilter" onkeyup="searchFilterFn()"></td>
				<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
			</tr>
			<?php

			if(count($clientlist) > 0){
				$i=0;
			foreach($clientlist as $clientval){
                        $i++;
			?>
			<tr id="row_<?php echo $i?>" bgcolor="#FFFFFF" class="lst">
				<td><?php echo $i?></td>				
				<td class="clnt"><?php echo $clientval["clientName"];?></a></td>
				<td><?php if($clientval["status"] == 1) { echo "Active";} else{ echo "In Active";}?></td>
				
				<td><a href="#" onclick='_getBox("editclient.php?page=Edit&ac=<?php echo $commonObj->Encrypt($clientval["clientId"]);?>","50%","90%")'><img src="images/edit.gif" border="0" alt="edit" title="Edit"></a> &nbsp; &nbsp;<a href="javascript:void(0)" onclick="confimuser('<?php echo $commonObj->Encrypt($clientval["clientId"]);?>','<?php echo $i?>');"><img src="images/close.gif" border="0" alt="Delete" title="Delete"></td>
				
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
		</tbody>
		</table>
		
		</form>
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
			confimationMsg('Are you sure you want to delete the vehicle?','DeleteUser',id+"~~~~~"+rowid);
		}

		function searchFilterFn(){
			var pvalue = $("#pjtsearchFilter").val().toLowerCase();
			var cvalue = $("#clientsearchFilter").val().toLowerCase();
			var noflag = true;
			$("#myDIV tr.lst").filter(function() {
				var cflag = pflag = true;
				if(cvalue !=''){
					cflag = $(this).children(".clnt").text().toLowerCase().indexOf(cvalue) > -1;
				}
				if(pvalue !=''){
					pflag = $(this).children(".pjt").text().toLowerCase().indexOf(pvalue) > -1;
				}
				$(this).toggle(pflag&&cflag);
				if(pflag&&cflag) noflag = false;
			});

			$("#noresult").toggle(noflag);
		}

		function DeleteUser(id){						
			str = id.split('~~~~~');
			$.ajax({
				type: "POST", url: 'clientaction.php', data: "id="+str[0]+"&hAct=3",
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
