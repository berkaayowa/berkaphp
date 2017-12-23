<h2 style="margin-top: 0;text-transform: capitalize;">New file</h2>
<form method="POST" action="/files/add" enctype="multipart/form-data">
    <div class="form-group row">
        <label class="control-label col-sm-2" for="Document"> document</label>
        <div class="col-sm-10">
            <input type="file" class="form-control {class}" name="Document" id="Document" placeholder=" document">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>