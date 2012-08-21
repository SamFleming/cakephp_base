<ul class="nav">
	<?php
	$nav = array(
		'/admin' => array(
			'title' => 'Home'
		),
		'/admin/users' => array(
			'title' => 'Users',
			'escape' => false,
			'class' => 'dropdown-toggle',
			'data-toggle' => 'dropdown',
			'children' => array(
				'/admin/users' => 'View',
				'/admin/users/add' => 'Add'
			)
		)
	);
	foreach($nav as $url => $options): ?>
	<?php

	$class = '';
	if($url == '/admin') {
		$class = $this->here == $this->base.'/admin' ? ' active' : '';
	} else {
		$class = strpos($this->here, $url) !== false ? ' active' : '';
	}

	$title = $options['title'];
	$children = isset($options['children']) ? $options['children'] : array();
	unset($options['title'], $options['children']);

	if(!empty($children)) $class .= ' dropdown';

	?>
	<li class="<?php echo $class; ?>">
		<?php echo $this->Html->link($title.(empty($children) ? '' : ' <b class="caret"></b>'), $url, $options); ?>
		<?php if(!empty($children)): ?>
			<ul class="dropdown-menu">
			<?php foreach($children as $url => $title): ?>
				<li><?php echo $this->Html->link($title, $url); ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ul>