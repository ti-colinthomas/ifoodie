<div class="row">
<div class="span11 well">
	<?php
		$attributes_form = array('id' => 'add_table_form','class' => 'form-horizontal');
		echo form_open('table/add_table',$attributes_form);
	?>
	<fieldset style="margin-top:10px;">
		<legend>Add Table</legend>
		<div class="control-group">
			<label class="control-label" for="txtTableName">Name</label>
			<div class="controls">
				<?php
					$attributes_input = array('name' => 'table_name', 'placeholder' => '' ,'id' => 'txtTableName', 'class' => 'input-medium', 'style' => 'height: 30px;');
					echo form_input($attributes_input);
				?>
				<p class="help-block">Enter name for the new table.</p>
			</div>
		</div>
		<div class="control-group error">
			<div class="controls" style="padding-top:5px;">
				<?php echo validation_errors(); ?>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Add Table</button>
		</div>
	</fieldset>
	<?php
		echo form_close();
	?>
</div>
</div>
