<?php $user_roles = $template_data['user_roles'] ?>
<br>
<br>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-inverse">
			<tr>
				<th style='text-transform: capitalize;'>role id</th>
				<th style='text-transform: capitalize;'>role name</th>
				<th style='text-transform: capitalize;'>role description</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user_roles as $data  ): ?>
				<tr>
					<td data-limit-char="20"><?=$data["role_id"]?></td>
					<td data-limit-char="20"><?=$data["role_name"]?></td>
					<td data-limit-char="20"><?=$data["role_description"]?></td>
					
					<td>
						<a href="/user_roles/edit/<?= $data['role_id'] ?>">
							<button type="button" class="btn btn-default">Edite</button>
						</a>
						<a href="/user_roles/delete/<?= $data['role_id'] ?>">
							<button type="button" class="btn btn-default">Delete</button>
						</a>
						<a href="/user_roles/view/<?= $data['role_id'] ?>">
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

