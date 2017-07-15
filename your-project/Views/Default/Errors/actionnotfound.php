<Br>
<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <div class="panel-group">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h2 class="error-title"><span class="label label-danger">Action Error</span></h2>
                <strong> An action could  not be found in the controller</strong>
            </div>
            <div class="panel-body">
                <div class="alert alert-default border-bottom" role="alert">
                    <strong>Controller Name : </strong> <?=$details['controller']?>
                </div>
                <div class="alert alert-default border-bottom" role="alert">
                    <strong>Controller Path : </strong> <?=$details['path']?>
                </div>
                <div class="alert alert-danger"" role="alert">
                    <strong>Action Name : </strong> <?=$details['action']?>
                </div>
                <div class="well">
                    <strong>This action should be a function in the <?=$details['controller']?> controller : </strong>
                    <br/><br/>
                    Example :
                    <br/><br/>

                    function <?=$details['action']?>() {
                    <br/>...<br/>
                    }
                </div>
            </div>
        </div>
    </div>
</div>