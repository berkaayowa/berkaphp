<?php $files = $template_data['files'] ?>
<br>
<br>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-inverse">
			<tr>
				<th style='text-transform: capitalize;'> File</th>
				<th style='text-transform: capitalize;'> document</th>
				<th>Options</th>
			</tr>
		</thead>
		<tbody>
		    <?php if(sizeof($files) > 0): ?>
			<?php foreach ($files as $data  ): ?>
				<tr>
					<td data-limit-char="20">
                        <?php

                        switch($data['Extension']) {

                            case "pdf":
                                echo '<i class="glyphicon glyphicon-save-file" aria-hidden="true"></i>';
                                break;
                            case "doc":
                            case "docx":
                                echo '<i class="glyphicon glyphicon-save-file" aria-hidden="true"></i>';
                                break;
                        }
                        ?>
					</td>
					<td data-limit-char="20">
                        <a href=""><?=$data["Name"]?></a>
                    </td>
					
					<td>
						<a href="/files/edit/<?= $data['ID'] ?>">
							Edite
						</a>
						<a href="/files/delete/<?= $data['ID'] ?>">
							Delete
						</a>
						<a href="/files/view/<?= $data['ID'] ?>">
							View
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

