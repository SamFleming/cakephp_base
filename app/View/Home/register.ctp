<div id="register-login-page">
	<?php if(isset($error)): ?>
	<div class="alert alert-error">
		<p><?php echo $error; ?></p>
	</div>
	<?php endif; ?>

	<div class="register-form">
		<h2>Create an Account</h2>

		<?php echo $this->Form->create("User"); ?>
		<fieldset>
			<?php

				echo $this->Form->input('name');
				echo $this->Form->input('email');
				echo $this->Form->input('password');

			?>
			<div class="input submit">
				<button class="btn btn-primary" type="submit" name="register">Create Account</button>
			</div>
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>

	<div class="login-form">
		<h2>Application Login</h2>

		<p>
			Please enter your email address and password.
		</p>

		<?php echo $this->Form->create('User'); ?>
			<fieldset>
				<?php
					echo $this->Form->input('email');
					echo $this->Form->input('password');
				?>
				<div class="input submit">
					<button class="btn btn-primary" type="submit" name="signin">Sign in</button>

					<?php echo $this->Html->link('Forgot Password?', '/forgot_password'); ?>
				</div>
			</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>