<?php
class G7_Contact_Info_Widget extends G7_Widget {

	function __construct() {

		$this->widget = array(
			'id_base'     => 'g7_contact_info',
			'name'        => 'Contact Info',
			'description' => __('Contact info, address, phone, email', 'g7theme'),
		);

		parent::__construct();
	}

	function set_fields() {
		$fields = array(
			'title' => array(
				'type'  => 'text',
				'label' => __('Title', 'g7theme'),
				'std'   => __('Contact Info', 'g7theme'),
			),
			'info' => array(
				'type'  => 'textarea',
				'label' => __('Info', 'g7theme'),
				'std'   => '',
			),
			'address' => array(
				'type'  => 'textarea',
				'label' => __('Address', 'g7theme'),
				'std'   => '',
			),
			'phone' => array(
				'type'  => 'text',
				'label' => __('Phone', 'g7theme'),
				'std'   => '',
			),
			'mobile' => array(
				'type'  => 'text',
				'label' => __('Mobile', 'g7theme'),
				'std'   => '',
			),
			'email' => array(
				'type'  => 'text',
				'label' => __('Email', 'g7theme'),
				'std'   => '',
			),
		);
		$this->fields = $fields;
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;

		$title = apply_filters('widget_title', $instance['title']);
		if (!empty($title)) {
			echo $before_title . $title . $after_title;
		}
		?>
		<ul>
			<?php if ($instance['info']) : ?>
				<li><?php echo $instance['info']; ?></li>
			<?php endif; ?>
			<?php if ($instance['address']) : ?>
				<li><i class="fa fa-map-marker"></i><?php echo $instance['address']; ?></li>
			<?php endif; ?>
			<?php if ($instance['phone']) : ?>
				<li><i class="fa fa-phone"></i><?php echo $instance['phone']; ?></li>
			<?php endif; ?>
			<?php if ($instance['mobile']) : ?>
				<li><i class="fa fa-mobile"></i><?php echo $instance['mobile']; ?></li>
			<?php endif; ?>
			<?php if ($instance['email']) : ?>
				<li><i class="fa fa-envelope"></i><?php echo $instance['email']; ?></li>
			<?php endif; ?>
		</ul>
		<?php
		echo $after_widget;
	}

}
