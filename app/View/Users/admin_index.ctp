<?php echo $this->Session->flash(); ?>

<?php echo $this->Html->link('Add User', array('admin' => true, 'action' => 'add'), array('class' => 'btn btn-primary pull-right')); ?>

<table class="table table-striped">
	<thead>
		<th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
		<th><?php echo $this->Paginator->sort('email', 'Email'); ?></th>
		<th><?php echo $this->Paginator->sort('modified', 'Modified'); ?></th>
		<th><?php echo $this->Paginator->sort('created', 'Created'); ?></th>
		<th>Actions</th>
	</thead>
	<tbody>
		<?php foreach($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['name']); ?></td>
			<td><?php echo h($user['User']['email']); ?></td>
			<td><?php echo !empty($user['User']['modified']) ? $this->Time->niceShort($user['User']['modified']) : 'N/A'; ?></td>
			<td><?php echo $this->Time->niceShort($user['User']['created']); ?></td>
			<td>
				<?php echo $this->Html->link('Edit', '/admin/users/edit/'.$user['User']['id']); ?>
				&nbsp;
				<form action="<?php echo $this->Html->url('/admin/users/delete/'.$user['User']['id']); ?>" style="margin: 0; display: inline;" method="post">
					<?php echo $this->Html->link('Delete', '#', array('class' => 'form-submit confirm', 'data-message' => 'Are you sure you want to delete this user?')); ?>
				</form>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->element('admin/pagination', array('model' => 'User')); ?>