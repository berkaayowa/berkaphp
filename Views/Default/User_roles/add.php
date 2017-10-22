<h2 style="margin-top: 0;text-transform: capitalize;">New user_role</h2>
<form method="POST" action="/user_roles/add">
	<label style='text-transform: capitalize;'>role id</label><br>
	<input type='text' class='form-control' name='role_id' placeholder='role id'><br>
	<label style='text-transform: capitalize;'>role name</label><br>
	<input type='text' class='form-control' name='role_name' placeholder='role name'><br>
	<label style='text-transform: capitalize;'>role description</label><br>
	<input type='text' class='form-control' name='role_description' placeholder='role description'><br>
	
	<button type="submit" class="btn btn-primary">Save</button>
</form>