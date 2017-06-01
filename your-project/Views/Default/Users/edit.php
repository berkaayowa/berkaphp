<?php $data = $template_data['user'][0]; ?>

<div class="container" style="padding-top: 0px;">
    <h1 class="page-header">Edit User</h1>
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
            <?php \berkaPhp\helpers\Element::load('UserMenu')?>
        </div>

        <div class="col-sm-12 col-md-9 col-lg-9">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <form method="POST" action="/users/edit/<?=$data['user_id']?>">
                <label style='text-transform: capitalize;'>user name</label><br>
                <input type="text" class="form-control" name="user_name" value="<?=$data["user_name"]?>"><br>
                <label style='text-transform: capitalize;'>user surname</label><br>
                <input type="text" class="form-control" name="user_surname" value="<?=$data["user_surname"]?>"><br>
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
</div>