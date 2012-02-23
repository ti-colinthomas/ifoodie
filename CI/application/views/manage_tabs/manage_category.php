<div descriptor="add-category">
	<fieldset>
		<?php
			$attributes_form = array('id' => 'add_category_form','class'=>'form-horizontal');
			echo form_open('manage/addcategory',$attributes_form);
		?>
		<legend>Add category</legend>
			<div class="control-group">
				<label class="control-label" for="txtAddCategory">Category name</label>
					<div class="controls">
						<?php
							$attributes_input = array('name' => 'category_name', 'id' => 'txtAddCategory', 'class' => 'input-medium', 'style' => 'height: 30px;');
							echo form_input($attributes_input);
						?>
					</div>
			</div>
			<div class="form-actions">
				<button class="btn btn-primary" type="submit">Add</button>
				<button class="btn">Cancel</button>
			</div>
			<?php
				form_close();
			?>
	</fieldset>
</div>