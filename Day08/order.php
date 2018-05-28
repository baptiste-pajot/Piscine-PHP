<?php
require_once("Team.class.php");
session_start();
$tab = $_SESSION['Team']->getTab();
$player = $_SESSION['Team']->getPlayer();
$tab[$player][$_GET['vessel'] -1]->setActive();
$grid_width  = 150;
$grid_height = 100;
$cell_width  = 8;
$cell_height = 8;
$gutter      = 0;
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Game bpaj</title>
	<style type="text/css" media="screen" >
	body {
		background-color: #efefef;
	}

	.grid {
		width : 1350px;
		height : 900px;
		position: relative;
		top: 0px;
		margin-left: auto;
		margin-right: auto;
	}

	.grid .row {
		margin-left: -<?php echo $gutter?>px;
	}

	.grid .row:after {
		content: " ";
		visibility: hidden;
		display: block;
		height: 0;
		clear: both;
	}

	.grid .cell {
		display: block;
		float: left;
		margin-left: <?php echo $gutter?>px;
		margin-bottom: <?php echo $gutter?>px;
		width: <?php echo $cell_width?>px;
		height: <?php echo $cell_height?>px;
		border: 1px solid #ccc;
		border-top: none;
		border-left: none;
		cursor: pointer;
		background: white;
		-webkit-transition: background 200ms linear;
		-moz-transition: background 200ms linear;
		-ms-transition: background 200ms linear;
		-o-transition: background 200ms linear;
		transition: background 200ms linear;
	}

	.grid .cell:hover {
		background-color: DarkOrange;
	}
	.btn_start {
		width : 100px;
		height : 50px;
		margin-left: auto;
		margin-right: auto;
	}

	.form {
		width : 15%;
		position: relative;
		top: 10px;
		margin-left: auto;
		margin-right: auto;
	}
    </style>
    </head>
<body>
    <div class="grid">
    <?php for ($w=0; $w<$grid_height; $w++): ?>
        <div class="row">
        <?php for ($h=0; $h<$grid_width; $h++): ?>
            <span class="cell"></span>
        <?php endfor ?>
        </div>
    <?php endfor ?>
	</div>
<form class= "form" method="get" action="movement.php">
	<fieldset>
		<h1>Team 
<?PHP
echo $player;
?>
		</h1>
		<select name = "vessel">
<?PHP
foreach ($tab[$player] as $elem)
{
	echo "<option value=\"".$elem->getId()."\"> ".$elem->getId()." ".$elem->getName()." </option>";
}
?>
		</select>
		<input class="btn" type="submit" value="Choose Vessel" />
	</fieldset>
</form>
<?PHP
echo $tab[$player][$_GET['vessel'] -1];
?>
</body>
</html>
