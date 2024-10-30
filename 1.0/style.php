<?php
	if (isset($_GET["params"]))
	{
		$vars = explode("-", htmlentities($_GET["params"]));
		$bgcolor = "#".$vars[0];
		$hrcolor = "#".$vars[1];
		$lkcolor = "#".$vars[2];
		$ttcolor = "#".$vars[3];
		header("Content-type: text/css");
	} else exit();
?>

a {
	color: <?php echo $lkcolor; ?>;
	font-weight:bold;
}

.fan_box .full_widget {
	background: <?php echo $bgcolor; ?>; border: none;
}
.fan_box .connections_grid .grid_item {
	padding: 0 8px 10px 8px;
}
	.fan_box .connections_grid .grid_item a img {
		box-shadow: 0px 0px 10px #333; -moz-box-shadow: 0px 0px 10px #333; -webkit-box-shadow: 0px 0px 10px #333;
	}
		.fan_box .connections_grid .grid_item a:hover img {
			box-shadow: 0px 3px 10px #333; -moz-box-shadow: 0px 3px 10px #333; -webkit-box-shadow: 0px 3px 10px #333;
		}
.fan_box .full_widget .connect_top {
	background: <?php echo $hrcolor; ?>;
}
.fan_box .connections .connections_grid {
	padding-top:16px;
}
.fan_box .connections {
	border-top: none;
	padding:15px 0 0;
	color: <?php echo $ttcolor; ?>;
	font: italic 12px Georgia;
	text-align: center;
	text-shadow: 0px 1px 1px #CCC;
}
	.fan_box .connections span.total {
		color: <?php echo $ttcolor; ?>;
	}

.fan_box .connections_grid .grid_item .name {
	color: <?php echo $ttcolor; ?>;
	font-size: 11px;
}
.fan_box .profileimage {
	margin: 0;
}