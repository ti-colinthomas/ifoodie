<div class="row">
<div class="span11 well">
	<?php
		$attributes_form = array('id' => 'add_category_form','class' => 'form-horizontal');
		echo form_open('category/add_category',$attributes_form);
	?>
	<fieldset style="margin-top:10px;">
		<legend>Add Category</legend>
		<div class="control-group">
			<label class="control-label" for="txtCategoryName">Name</label>
			<div class="controls">
				<?php
					$attributes_input = array('name' => 'category_name', 'placeholder' => '' ,'id' => 'txtCategoryName', 'class' => 'input-medium', 'style' => 'height: 30px;');
					echo form_input($attributes_input);
				?>
				<p class="help-block">Enter the name for the new category</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtCategoryName">Priority</label>
			<div class="controls">
				<?php
						$attributes_input = array('name' => 'category_priority', 'placeholder' => '' ,'id' => 'txtCategoryPriority', 'class' => 'input-small', 'style' => 'height: 30px;');
						echo form_input($attributes_input);
				?>
				<p class="help-block">Enter a numeric value as priority for the new category</p>
			</div>
		</div>
		<div class="control-group error">
			<div class="controls" style="padding-top:5px;">
				<?php echo validation_errors('<div class="error help-inline">', '</div>'); ?>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Add Category</button>
		</div>
	</fieldset>
	<?php
		echo form_close();
	?>
</div>
</div>
