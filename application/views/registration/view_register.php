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
				<option value="" selected="selected">-Select Country-</option>
				<option value="United States">United States</option>
				<option value="United Kingdom">United Kingdom</option>
				<option value="Afghanistan">Afghanistan</option>
				<option value="Albana">Albana</option>
				<option value="Algeria">Algeria</option>
				<option value="American Samoa">American Samoa</option>
				<option value="Andorra">Andorra</option>
				<option value="Anguilla">Anguilla</option>
				<option value="Antartica">Antartica</option>
				<option value="Argentina">Argentina</option>
				<option value="Australia">Australia</option>
				<option value="Austria">Austria</option>
				<option value="Bahrain">Bahrain</option>
				<option value="Bangladesh">Bangladesh</option>
				<option value="Belgium">Belgium</option>
				<option value="Brazilia">Brazilia</option>
				<option value="Indonesia">Indonesia</option>
				<option value="India">India</option>
				<option value="Italia">Italia</option>
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