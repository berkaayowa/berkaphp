<?php $users = $template_data['users'] ?>
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
				<th style='text-transform: capitalize;'>user cellphone</th>
				<th style='text-transform: capitalize;'>user password</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $data  ): ?>
				<tr>
					<td data-limit-char="20"><?=$data["user_id"]?></td>
					<td data-limit-char="20"><?=$data["user_name"]?></td>
					<td data-limit-char="20"><?=$data["user_lastname"]?></td>
					<td data-limit-char="20"><?=$data["user_email"]?></td>
					<td data-limit-char="20"><?=$data["user_cellphone"]?></td>
					<td data-limit-char="20"><?=$data["user_password"]?></td>

					<td>
						<a href="/users/edit/<?= $data['user_id'] ?>">
							<button type="button" class="btn btn-default">Edite</button>
						</a>
						<a href="/users/delete/<?= $data['user_id'] ?>">
							<button type="button" class="btn btn-default">Delete</button>
						</a>
						<a href="/users/view/<?= $data['user_id'] ?>">
							<button type="button" class="btn btn-default">View</button>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<script>
	$app.initList();
</script>

