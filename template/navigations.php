<link rel="stylesheet" type="text/css" href="dynamicmenu/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="dynamicmenu/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="dynamicmenu/ddlevelsmenu-sidebar.css" />
<script type="text/javascript" src="dynamicmenu/ddlevelsmenu.js"></script>
<div id="ddtopmenubar" class="mattblackmenu">
<ul>
<li><a href="home.php">Home</a></li>
<?php if($session_type == 1){?>
<li><a href="users.php" rel="ddsubmenu1">Manage User</a></li>
<?php }?>
<?php if($session_type == 1 || $session_type == 2){?>
<li><a href="workers.php" rel="ddsubmenu2">Manage Workers & Team</a></li>
<?php }?>
<?php if($session_type == 1 || $session_type == 2){?>
<li><a href="projects.php" rel="ddsubmenu3">Manage Projects</a></li>
<?php }?>
<?php if($session_type == 1 || $session_type == 2){?>
<li><a href="projects.php" rel="ddsubmenu4">Manage Contracts</a></li>
<?php }?>
<?php if($session_type == 1 || $session_type == 2){?>
<li><a href="projects.php" rel="ddsubmenu5">Manage Clients</a></li>
<?php }?>
<?php if($session_type == 1 || $session_type == 2){?>
<li><a href="projects.php" rel="ddsubmenu6">Manage Scaffold</a></li>
<?php }?>

</ul>
</div>
<script type="text/javascript">
	ddlevelsmenu.setup("ddtopmenubar", "topbar")
</script>

<ul id="ddsubmenu1" class="ddsubmenustyle">
	<li id="firstChild"><a href="users.php">View Users</a></li>
	<li><a href="createusers.php">Create User</a></li>		
</ul>
<ul id="ddsubmenu2" class="ddsubmenustyle">
	<li id="firstChild"><a href="workers.php">View Workers</a></li>
	<li><a href="createworkers.php">Create Worker</a></li>
	<li id="firstChild"><a href="workersteam.php">View Workers Team</a></li>		
	<li><a href="createworkersteam.php">Create Workers team</a></li>		
</ul>
<ul id="ddsubmenu3" class="ddsubmenustyle">
	<li id="firstChild"><a href="projects.php">View Project</a></li>
	<li><a href="createproject.php">Create Project</a></li>
</ul>
<ul id="ddsubmenu4" class="ddsubmenustyle">	
	<li id="firstChild"><a href="contracts.php">View Contracts</a></li>		
	<li><a href="createcontract.php">Create Contract</a></li>
</ul>		
<ul id="ddsubmenu5" class="ddsubmenustyle">	
	<li id="firstChild"><a href="clients.php">View Clients</a></li>		
	<li><a href="createclient.php">Create Client</a></li>		
</ul>
<ul id="ddsubmenu6" class="ddsubmenustyle">	
	<li id="firstChild"><a href="scaffold.php">View Scaffold</a></li>		
	<li><a href="createscaffold.php">Create Scaffold</a></li>		
</ul>