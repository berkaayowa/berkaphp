<?php  ?>

<form method="POST" action="/generators/run/">
	<div class="col-md-6">
		<h2>Auto genating Files</h2>
		<label class="form-label">Select Table To generate Element for</label><br>
		<select class="form-control selectpicker" name="table">
			<option>---</option>
			<?php foreach ($template_data['tables'] as $table => $name  ): ?>
				<option value="<?=$name?>" ><?=$name?></option>
			<?php endforeach ?>
		</select><br>

		<h4>Select Element/s To Generate</h4>
		<div class="funkyradio">
			<div class="funkyradio-default" style="width: 133px;">
				<input type="checkbox" name="model" id="checkbox1"/>
				<label for="checkbox1">Model</label>
			</div>
			<div class="funkyradio-default" style="width: 133px;">
				<input type="checkbox" name="views" id="checkbox2"/>
				<label for="checkbox2">Views</label>
			</div>
			<div class="funkyradio-default" style="width: 133px;">
				<input type="checkbox" name="controller" id="checkbox3"/>
				<label for="checkbox3">Controller</label>
			</div>
			<div class="funkyradio-default" style="width: 133px;">
				<input type="checkbox" name="all" id="checkbox4"/>
				<label for="checkbox4">All</label>
			</div>
			<div class="funkyradio-default" style="width: 133px;">
				<input type="checkbox" name="all_table" id="checkbox5"/>
				<label for="checkbox5">All Table</label>
			</div>

		</div><br>
		<button type="submit" class="btn btn-primary" style="width: 133px;">Generate</button>
	</div>

</form>
