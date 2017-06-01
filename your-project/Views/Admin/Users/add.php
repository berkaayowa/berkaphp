<h2 style="margin-top: 0;text-transform: capitalize;">New user</h2>
<form method="POST" action="/users/add">
	<label style='text-transform: capitalize;'>user id</label><br>
	<input type='text' class='form-control' name='user_id' placeholder='user id'><br>
	<label style='text-transform: capitalize;'>user name</label><br>
	<input type='text' class='form-control' name='user_name' placeholder='user name'><br>
	<label style='text-transform: capitalize;'>user surname</label><br>
	<input type='text' class='form-control' name='user_surname' placeholder='user surname'><br>
	<label style='text-transform: capitalize;'>user email</label><br>
	<input type='text' class='form-control' name='user_email' placeholder='user email'><br>
	<label style='text-transform: capitalize;'>user cellphone</label><br>
	<input type='text' class='form-control' name='user_cellphone' placeholder='user cellphone'><br>
	<label style='text-transform: capitalize;'>user password</label><br>
	<input type='text' class='form-control' name='user_password' placeholder='user password'><br>
	
	<button type="submit" class="btn btn-primary">Save</button>
</form>