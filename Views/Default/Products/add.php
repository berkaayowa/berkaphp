<h2 style="margin-top: 0;text-transform: capitalize;">New product</h2>
<form method="POST" action="/products/add" enctype="multipart/form-data">

    <div class="form-group row">
        <label class="control-label col-sm-2" for="ID"> i d</label>
        <div class="col-sm-10">
            <input type="numeric" class="form-control " name="ID" id="ID" placeholder=" i d">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Name"> name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control " name="Name" id="Name" placeholder=" name">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Description"> description</label>
        <div class="col-sm-10">
            <textarea class="form-control " name="Description" id="Description" placeholder=" description"></textarea>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Image"> image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control " name="Image" id="Image" placeholder=" image">
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="DateAdded"> date added</label>
        <div class="col-sm-10">
            <div class="input-group date" data-date>
                <input type="text" class="form-control " data-date data-format="YYYY-MM-DD" name="DateAdded" id="DateAdded" placeholder=" date added">
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
                <input type="text" class="form-control " data-date data-format="HH:mm" name="TimeAdded" id="TimeAdded" placeholder=" time added">
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
                <input type="text" class="form-control " data-date data-format="YYYY-MM-DD HH:mm" name="SoldDateTime" id="SoldDateTime" placeholder=" sold date time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
        
    <div class="form-group row">
        <label class="control-label col-sm-2" for="IsInStock"> is in stock</label>
        <div class="col-sm-10">
            <input type="checkbox" class="checkbox " name="IsInStock" id="IsInStock" placeholder=" is in stock" value="true" >
        </div>
    </div>
        
    <button type="submit" class="btn btn-primary">Save</button>
</form>