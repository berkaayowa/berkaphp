<h2 style="margin-top: 0;text-transform: capitalize;">New user</h2>
<form method="POST" action="/users/login">
    <label style='text-transform: capitalize;'>user email</label><br>
    <input type='text' class='form-control' name='user_email' placeholder='user email'><br>
    <label style='text-transform: capitalize;'>user password</label><br>
    <input type='text' class='form-control' name='user_password' placeholder='user password'><br>

    <button type="submit" class="btn btn-primary">login</button>
</form>