<div class="container">
    <div class="row">
        <?= berkaPhp\helpers\Element::load("Requirement")?>
        <?= berkaPhp\helpers\Element::load("LeftMenu")?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <form data-form method="post" action="<?= berkaPhp\helpers\Html::action('/installer/database')?>">
                <div class="form-group ">
                    <label class="control-label requiredField" for="server_addres">
                        Server Address or IP
                       <span class="asteriskField">
                        *
                       </span>
                    </label>
                    <input data-required class="form-control" id="serverAddress" name="serverAddress" type="text"/>
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="databaseName">
                        DB Name
                       <span class="asteriskField">
                        *
                       </span>
                    </label>
                    <input data-required class="form-control" id="databaseName" name="databaseName" type="text"/>
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="databaseUser">
                        DB User
                   <span class="asteriskField">
                    *
                   </span>
                    </label>
                    <input data-required class="form-control" id="databaseUser" name="databaseUser" type="text"/>
                </div>
                <div class="form-group ">
                    <label class="control-label requiredField" for="databasePassword">
                        DB Password
                   <span class="asteriskField">
                    *
                   </span>
                    </label>
                    <input data-required class="form-control" id="databasePassword" name="databasePassword" type="text"/>
                </div>
                <div class="form-group">
                    <div>
                        <button class="btn btn-primary " name="submit" type="submit">
                            Connect Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
