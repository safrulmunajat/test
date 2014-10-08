<div id="register_form">
	<h2>Register</h2>
	<form action="/test/register/register_user" method="POST">
		<div>
			<label for="firstname">First Name: </label>
			<input type="text" value="<?php echo set_value('firstname'); ?>" name="firstname">
		</div>
		<div>
			<label for="lastname">Last Name: </label>
			<input type="text" value="<?php echo set_value('lastname'); ?>" name="lastname">
		</div>
		<div>
			<label for="country">Country: </label>
			<select name="contry">
				<option value="" selected="selected">Select Country</option>
				<option value="United States"></option>
				<option value="United Kingdom"></option>
				<option value="Afghanistan"></option>
				<option value="Albana"></option>
				<option value="Algeria"></option>
				<option value="American Samoa"></option>
				<option value="Andorra"></option>
				<option value="Anguilla"></option>
				<option value="Antartica"></option>
				<option value="Argentina"></option>
				<option value="Australia"></option>
				<option value="Austria"></option>
				<option value="Bahrain"></option>
				<option value="Bangladesh"></option>
				<option value="Belgium"></option>
				<option value="Brazilia"></option>
				<option value="Indonesia"></option>
				<option value="India"></option>
				<option value="Italia"></option>
			</select>
		</div>
		<div>
			<label for="email">Email: </label>
			<input type="email" value="<?php echo set_value('email'); ?>" name="email">
		</div>
		<div>
			<label for="password">Password: </label>
			<input type="password" value="" name="password">
		</div>
			<div>
			<label for="password_conf">Confrim Password: </label>
			<input type="password" value="" name="password_conf">
		</div>
		<div>
			<input type="submit" value="Register" name="submit">
		</div>
	</form>
	<?php echo validation_errors('<p class="error">'); ?>
</div> <!-- end register -->