<?php $data = $template_data['contac'][0]; ?>

<h2 style="margin-top: 0;text-transform: capitalize;">Viewing contac</h2>
<form >
	<label style='text-transform: capitalize;'>email address</label><br>
	<input type="text" readonly class="form-control" name="email_address" value="<?=$data["email_address"]?>"><br>
	<label style='text-transform: capitalize;'>physical address</label><br>
	<input type="text" readonly class="form-control" name="physical_address" value="<?=$data["physical_address"]?>"><br>
	<label style='text-transform: capitalize;'>tel</label><br>
	<input type="text" readonly class="form-control" name="tel" value="<?=$data["tel"]?>"><br>
	<label style='text-transform: capitalize;'>skype</label><br>
	<input type="text" readonly class="form-control" name="skype" value="<?=$data["skype"]?>"><br>
	
	<input type="hidden" name="id" value="<?=$data['id']?>">
	<a href="/contact" class="btn btn-primary">Go Back</a>
</form>