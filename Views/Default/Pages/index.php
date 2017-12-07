<div class="container">
	<div class="row text-center"">
		<div class="col-md-12 col-sm-12 col-lg-12">
            <img src="<?= LOGO_URL?>" alt=""/>
			<h2>Welcome on berkaPhp</h2>
			<p>
				BerkaPhp is a PHP MVC framework that will help you quickly write a web application and gives full controller over your application.
			</p>
            <p>
                Click <a href="/installer/database">here </a>to the database configuration
            </p>

		</div>		

        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-lg-6 col-lg-offset-3 ">
            <br/>
            </div>
        </div
    </div>

    <a class="btn btn-success btn-sm pull-left" href="#" <?= \berkaPhp\helpers\Model::openButton('test') ?>>Add New Tasks</a>

<?php
$modelData = \berkaPhp\helpers\Form::Create(array(
    ['type'=>"text", 'id'=>"TaskName", 'placeholder'=>"Enter task name", 'caption'=>'Task'],
    ['type'=>"text", 'id'=>"category", 'placeholder'=>"Select category", 'caption'=>'category'],
    ['type'=>"textarea", 'id'=>"description", 'placeholder'=>"Enter description", 'caption'=>'Description']
), array('text'=>'Save task'))
?>

<?= \berkaPhp\helpers\Model::Create(['id' => 'test', 'title'=>'New Task', 'content'=>$modelData], false) ?>




</div>
