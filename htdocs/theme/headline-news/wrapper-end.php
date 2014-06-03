<?php
global $g7_layout;
$sidebar1_id = 'sidebar1';
$sidebar2_id = 'sidebar2';
if (is_page() || is_single()) {
	$sidebar1_name = get_post_meta(get_the_ID(), '_g7_sidebar1', true);
	$sidebar2_name = get_post_meta(get_the_ID(), '_g7_sidebar2', true);
	if (!empty($sidebar1_name)) {
		$sidebar1_id = g7_sidebar_id($sidebar1_name);
	}
	if (!empty($sidebar2_name)) {
		$sidebar2_id = g7_sidebar_id($sidebar2_name);
	}
}
switch ($g7_layout) {
	case 1:
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-3 sidebar">';
		dynamic_sidebar($sidebar2_id);
		echo '</div>';
		echo '</div>';
		echo '</div>';
		break;
	case 2:
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-2 col-md-pull-10 sidebar">';
		dynamic_sidebar($sidebar1_id);
		echo '</div>';
		echo '</div>';
		echo '</div>';
		break;
	case 3:
		echo '</div>';
		echo '</div>';
		break;
	case 4:
	default:
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-2 col-md-pull-7 col-xs-6 sidebar">';
		dynamic_sidebar($sidebar1_id);
		echo '</div>';
		echo '<div class="col-md-3 col-xs-6 sidebar">';
		dynamic_sidebar($sidebar2_id);
		echo '</div>';
		echo '</div>';
		echo '</div>';
		break;
}
