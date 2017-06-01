<div class="btn-group" role="group" aria-label="Basic example">
    <?= \berkaPhp\helpers\Html::button("New User",['class'=>'btn btn-secondary', 'href'=>'/users/add'], 'fa fa-fw fa-edit') ?>
</div>
<br>
<br>
<form method="POST" action="/users/search/">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form>
<br>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-inverse">
			<tr>
				<th style='text-transform: capitalize;'>user id</th>
				<th style='text-transform: capitalize;'>user name</th>
				<th style='text-transform: capitalize;'>user surname</th>
				<th style='text-transform: capitalize;'>user email</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $data  ): ?>
				<tr>
					<td data-limit-char="20"><?=$data["user_id"]?></td>
					<td data-limit-char="20"><?=$data["user_name"]?></td>
					<td data-limit-char="20"><?=$data["user_name"]?></td>
					<td data-limit-char="20"><?=$data["user_email"]?></td>
					<td>
                        <?= \berkaPhp\helpers\Html::button("Edite",['class'=>'btn btn-secondary', "href"=>"/users/edit/{$data['user_id']}"], 'fa fa-fw fa-edit') ?>
                        <?= \berkaPhp\helpers\Html::button("Delete",['class'=>'btn btn-secondary', "href"=>"/users/delete/{$data['user_id']}"], 'fa fa-fw fa-edit') ?>
                        <?= \berkaPhp\helpers\Html::button("View",['class'=>'btn btn-secondary', "href"=>"/users/view/{$data['user_id']}"], 'fa fa-fw fa-edit') ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script>
	$app.initList();
	$app.initHome();
</script>

