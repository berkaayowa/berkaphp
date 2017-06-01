
<div class="container" style="padding-top: 0px;">
  <div class="row">
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info col-md-offset-2">
        <br>
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <i class="fa fa-user"></i>
        This is an <strong>.alert</strong>. Use this to show important messages to the user.
      </div>
      <!-- <h3>Personal info</h3> -->
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">First name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_name" value="<?=\berkaPhp\helpers\Auth::get_active_user("user_name")?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Last name:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_surname" value="<?=\berkaPhp\helpers\Auth::get_active_user("user_lastname")?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Company:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Email:</label>
          <div class="col-lg-8">
            <input class="form-control" name="user_email" value="<?=\berkaPhp\helpers\Auth::get_active_user("user_email")?>" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Password:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?=\berkaPhp\helpers\Auth::get_active_user("user_password")?>" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirm password:</label>
          <div class="col-md-8">
            <input class="form-control" value="<?=\berkaPhp\helpers\Auth::get_active_user("user_password")?>" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Upadte Your Profile" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancel" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>