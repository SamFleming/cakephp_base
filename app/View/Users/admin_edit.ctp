<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
<fieldset>
	<legend>Edit User</legend>
	<?php
	$id = array(
		'div' => array('class' => 'control-group'),
		'label' => array('class' => 'control-label'),
		'between' => '<div class="controls">',
		'after' => '</div>',
		'class' => ''
	);

	echo $this->Session->flash();

	echo $this->Form->input('name', $id);
	echo $this->Form->input('email', $id);
	echo $this->Form->input('password', $id);
	?>
	<div class="form-actions">
		<?php echo $this->Form->submit('Save Changes', array('class' => 'btn btn-primary', 'div' => false)); ?>
		<button class="back btn">Cancel</button>
	</div>
</fieldset>
<?php echo $this->Form->end(); ?>