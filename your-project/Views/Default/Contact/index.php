<?php $contact = $template_data['contact'] ?>
<form method="POST" action="/contact/search/">
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
				<th style='text-transform: capitalize;'>id</th>
				<th style='text-transform: capitalize;'>email address</th>
				<th style='text-transform: capitalize;'>physical address</th>
				<th style='text-transform: capitalize;'>tel</th>
				<th style='text-transform: capitalize;'>skype</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($contact as $data  ): ?>
				<tr>
					<td data-limit-char="20"><?=$data["id"]?></td>
					<td data-limit-char="20"><?=$data["email_address"]?></td>
					<td data-limit-char="20"><?=$data["physical_address"]?></td>
					<td data-limit-char="20"><?=$data["tel"]?></td>
					<td data-limit-char="20"><?=$data["skype"]?></td>
					
					<td>
						<a href="/contact/edit/<?= $data['id'] ?>">
							<button type="button" class="btn btn-default">Edite</button>
						</a>
						<a href="/contact/delete/<?= $data['id'] ?>">
							<button type="button" class="btn btn-default">Delete</button>
						</a>
						<a href="/contact/view/<?= $data['id'] ?>">
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

