<Br>
<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <div class="panel-group">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h2 class="error-title"><span class="label label-danger">Model File Error</span></h2>
                <strong> Model file could not be found</strong>
            </div>
            <div class="panel-body">
                <?php if(!empty($details['name'])): ?>
                <div class="alert alert-default border-bottom" role="alert">
                    <strong>Model Name : </strong> <?=$details['name']?>
                </div>
                <?php endif; ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Model Path : </strong> <?=$details['path']?>
                </div>
            </div>
        </div>
    </div>
</div>