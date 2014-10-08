<div id="login_form">
	<h2>Login</h2>
	<form action="/login/login_user" method="POST">
		<div>
			<label for="username">Username: </label>
			<input type="text" value="<?php echo set_value('username'); ?>" name="username">
		</div>
		<div>
			<label for="password">Password: </label>
			<input type="password" value="" name="password">
		</div>
		<div>
			<input type="submit" value="Login" name="submit">
		</div>
	</form>
	<?php echo validation_errors('<p class="error">'); ?>
</div> <!-- end Login -->

