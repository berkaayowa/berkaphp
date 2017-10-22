<?php $data = $template_data['user_role'][0]; ?>

<h2 style="margin-top: 0;text-transform: capitalize;">Editing user_role</h2>
<form method="POST" action="/user_roles/edit/<?=$data['role_id']?>">
	<label style='text-transform: capitalize;'>role name</label><br>
	<input type="text" class="form-control" name="role_name" value="<?=$data["role_name"]?>"><br>
	<label style='text-transform: capitalize;'>role description</label><br>
	<input type="text" class="form-control" name="role_description" value="<?=$data["role_description"]?>"><br>
	
	<input type="hidden" name="role_id" value="<?=$data['role_id']?>">
	<button type="submit" class="btn btn-primary">Save</button>
</form>