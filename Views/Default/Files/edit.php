<?php $data = $template_data['file'][0]; ?>

<h2 style="margin-top: 0;text-transform: capitalize;">Editing file</h2>
<form method="POST" action="/files/edit/<?=$data['ID']?>" enctype="multipart/form-data">
	
            <div class="form-group row">
                <label class="control-label col-sm-2" for="ID"> i d</label>
                <div class="col-sm-10">
                    <input type="numeric" class="form-control {class}" name="ID" id="ID" placeholder=" i d">
                </div>
            </div>
        
            <div class="form-group row">
                <label class="control-label col-sm-2" for="Document"> document</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control {class}" name="Document" id="Document" placeholder=" document">
                </div>
            </div>
        
	<input type="hidden" name="ID" value="<?=$data['ID']?>">
	<button type="submit" class="btn btn-primary">Save</button>
</form>