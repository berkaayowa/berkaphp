<?php $data = $template_data['user_role'][0]; ?>

<h2 style="margin-top: 0;text-transform: capitalize;">Viewing user_role</h2>
<form >
	<label style='text-transform: capitalize;'>role name</label><br>
	<input type="text" readonly class="form-control" name="role_name" value="<?=$data["role_name"]?>"><br>
	<label style='text-transform: capitalize;'>role description</label><br>
	<input type="text" readonly class="form-control" name="role_description" value="<?=$data["role_description"]?>"><br>
	
	<input type="hidden" name="role_id" value="<?=$data['role_id']?>">
	<a href="/user_roles" class="btn btn-primary">Go Back</a>
</form>