<?php $data = $template_data['user'][0]; ?>
<h1 class="page-header">Edit User</h1>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <form method="POST" action="/admin/users/edit/<?=$data['user_id']?>">
            <label style='text-transform: capitalize;'>user name</label><br>
            <input type="text" class="form-control" name="user_name" value="<?=$data["user_name"]?>"><br>
            <label style='text-transform: capitalize;'>user surname</label><br>
            <input type="text" class="form-control" name="user_surname" value="<?=$data["user_name"]?>"><br>
            <label style='text-transform: capitalize;'>user email</label><br>
            <input type="text" class="form-control" name="user_email" value="<?=$data["user_email"]?>"><br>
            <label style='text-transform: capitalize;'>user cellphone</label><br>
            <input type="text" class="form-control" name="user_cellphone" value="<?=$data["user_cellphone"]?>"><br>
            <label style='text-transform: capitalize;'>user password</label><br>
            <input type="text" class="form-control" name="user_password" value="<?=$data["user_password"]?>"><br>
            <input type="hidden" name="user_id" value="<?=$data['user_id']?>">
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
