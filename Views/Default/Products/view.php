<?php $data = $template_data['product'][0]; ?>

<h2 style="margin-top: 0;text-transform: capitalize;">Viewing product</h2>
<form >
	
    <div class="form-group row">
        <label class="control-label col-sm-2" for="ID"> i d</label>
        <div class="col-sm-10">
            <input type="numeric" class="form-control " name="ID" id="ID" value="<?=$data["ID"]?>" placeholder=" i d">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Name"> name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control " name="Name" id="Name" value="<?=$data["Name"]?>" placeholder=" name">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Description"> description</label>
        <div class="col-sm-10">
            <textarea class="form-control " name="Description" id="Description" placeholder=" description"><?=$data["Description"]?></textarea>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Image"> image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control " name="Image" id="Image" value="<?=$data["Image"]?>" placeholder=" image">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="DateAdded"> date added</label>
        <div class="col-sm-10">
            <div class="input-group date" data-date>
                <input type="text" class="form-control " data-date data-format="YYYY-MM-DD" name="DateAdded" id="DateAdded" value="<?=$data["DateAdded"]?>" placeholder=" date added">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="TimeAdded"> time added</label>
        <div class="col-sm-10">
            <div class="input-group date" data-date>
                <input type="text" class="form-control " data-date data-format="HH:mm" name="TimeAdded" id="TimeAdded" value="<?=$data["TimeAdded"]?>" placeholder=" time added">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="SoldDateTime"> sold date time</label>
        <div class="col-sm-10">
            <div class="input-group date" data-date>
                <input type="text" class="form-control " data-date data-format="YYYY-MM-DD HH:mm" name="SoldDateTime" id="SoldDateTime" value="<?=$data["SoldDateTime"]?>" placeholder=" sold date time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="IsInStock"> is in stock</label>
        <div class="col-sm-10">
            <input type="checkbox" class="checkbox " name="IsInStock" id="IsInStock" placeholder=" is in stock" value="true" <?=$data["IsInStock"] == "1" ? "checked=true" : ""?>>
        </div>
    </div>
        
	<input type="hidden" name="ID" value="<?=$data['ID']?>">
	<a href="/products" class="btn btn-primary">Go Back</a>
</form>