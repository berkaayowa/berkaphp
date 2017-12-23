<?php $products = $template_data['products'] ?>
<br>
<br>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-inverse">
			<tr>
				<th style='text-transform: capitalize;'> i d</th>
				<th style='text-transform: capitalize;'> name</th>
				<th style='text-transform: capitalize;'> description</th>
				<th style='text-transform: capitalize;'> image</th>
				<th style='text-transform: capitalize;'> date added</th>
				<th style='text-transform: capitalize;'> time added</th>
				<th style='text-transform: capitalize;'> sold date time</th>
				<th style='text-transform: capitalize;'> is in stock</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
		    <?php if(sizeof($products) > 0): ?>
			<?php foreach ($products as $data  ): ?>
				<tr>
					<td data-limit-char="20"><?=$data["ID"]?></td>
					<td data-limit-char="20"><?=$data["Name"]?></td>
					<td data-limit-char="20"><?=$data["Description"]?></td>
					<td data-limit-char="20"><?=$data["Image"]?></td>
					<td data-limit-char="20"><?=$data["DateAdded"]?></td>
					<td data-limit-char="20"><?=$data["TimeAdded"]?></td>
					<td data-limit-char="20"><?=$data["SoldDateTime"]?></td>
					<td data-limit-char="20"><?=$data["IsInStock"]?></td>
					
					<td>
						<a href="/products/edit/<?= $data['ID'] ?>">
							<button type="button" class="btn btn-default">Edite</button>
						</a>
						<a href="/products/delete/<?= $data['ID'] ?>">
							<button type="button" class="btn btn-default">Delete</button>
						</a>
						<a href="/products/view/<?= $data['ID'] ?>">
							<button type="button" class="btn btn-default">View</button>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<script>
	$app.initList(); 
</script>

