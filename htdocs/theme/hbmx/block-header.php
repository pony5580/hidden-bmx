<?php
global $g7_block_title, $g7_cat;
$link1 = '<span>';
$link2 = '</span>';
if (!empty($g7_cat)) {
	$category_name = esc_attr(get_the_category_by_ID($g7_cat));
	$category_link = esc_url(get_category_link($g7_cat));
	$link1 = '<a href="' . $category_link . '">';
	$link2 = '</a>';
}
?>
<h2 class="block-title">
	<?php echo $link1; ?>
		<?php echo $g7_block_title; ?>
	<?php echo $link2; ?>
</h2>