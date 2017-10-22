
<Br>
<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <div class="panel-group">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h2 class="error-title"><span class="label label-danger">Tempalte File Error</span></h2>
                <strong> A template of an action could not be found</strong>
            </div>
            <div class="panel-body">
                <div class="alert alert-default border-bottom" role="alert">
                    <strong>Controller Name : </strong> <?=$details['controller']?>
                </div>
                <div class="alert alert-default border-bottom" role="alert">
                    <strong>Action Name : </strong> <?=$details['view']?>
                </div>
                <div class="alert alert-danger" role="alert">
                    <strong>Action Template Path : </strong> <?=$details['path']?>
                </div>
            </div>
        </div>
    </div>
</div>