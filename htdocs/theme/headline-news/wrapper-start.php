<?php
global $g7_layout;
if (empty($g7_layout)) {
	$g7_layout = g7_page_layout();
}
switch ($g7_layout) {
	case 1:
		echo '<div class="container right-sidebar">';
		echo '<div class="row content-row">';
		echo '<div class="col-md-9">';
		echo '<div class="content">';
		break;
	case 2:
		echo '<div class="container left-sidebar">';
		echo '<div class="row content-row">';
		echo '<div class="col-md-10 col-md-push-2">';
		echo '<div class="content">';
		break;
	case 3:
		echo '<div class="container">';
		echo '<div class="content">';
		break;
	case 4:
	default:
		echo '<div class="container dual-sidebar">';
		echo '<div class="row content-row">';
		echo '<div class="col-md-7 col-md-push-2 col-xs-12">';
		echo '<div class="content">';
		break;
}
