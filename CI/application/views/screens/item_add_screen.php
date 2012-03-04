<div class="row">
<div class="span11 well">
	<?php
		$attributes_form = array(
									'id' => 'add_item_form',
									'class' => 'form-horizontal',
								);
		echo form_open('item/add_item',$attributes_form);
	?>
	<fieldset style="margin-top:10px;">
		<legend>Add Menu Item</legend>
		<div class="control-group">
			<label class="control-label" for="txtItemName">Name</label>
			<div class="controls">
				<?php
					$attributes_input = array(
												'name' => 'item_name', 
												'id' => 'txtItemName', 
												'class' => 'input-medium', 
												'style' => 'height: 30px;',
											);
					echo form_input($attributes_input);
				?>
				<p class="help-block">Enter the name for the new menu item.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemDescription">Description</label>
			<div class="controls">
				<?php
						$attributes_input = array(
													'name' => 'item_description', 
													'id' => 'txtItemDescription',
													'rows' => '4', 
													'cols' => '25',
												);
						echo form_textarea($attributes_input);
				?>
				<p class="help-block">A short description about the dish.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemCost">Cost</label>
			<div class="controls">
				<?php
						$attributes_input = array(
													'name' => 'item_cost', 
													'id' => 'txtItemCost', 
													'class' => 'input-medium', 
													'style' => 'height: 30px;',
												);
						echo form_input($attributes_input);
				?>
				<p class="help-block">The amout to be charged for the dish.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemClass">Item class</label>
			<div class="controls">
				<?php
						$attributes_input = array(
													'value' => 'veg', 
													'checked' => TRUE, 
													'style' => 'margin: 8px;',
												);
						echo form_radio($attributes_input);
				?>			Vegetarian
				<?php
						$attributes_input = array(
													'value' => 'nonveg', 
													'checked' => TRUE, 
													'style' => 'margin: 8px;',
												);
						echo form_radio($attributes_input);
				?>			Non-Vegetarian
				<p class="help-block">Is the dish vegetarian or non-vegetarian?</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemCookTime">Cooking time</label>
			<div class="controls">
				<?php
						$attributes_input = array(
													'name' => 'item_cooktime', 
													'id' => 'txtItemCookTime', 
													'class' => 'input-medium', 
													'style' => 'height: 30px;',
												);
						echo form_input($attributes_input);
				?>
				<p class="help-block">Time required to prepare the dish.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemCalCount">Calorie count</label>
			<div class="controls">
				<?php
						$attributes_input = array(
													'name' => 'item_calcount', 
													'id' => 'txtItemCalCount', 
													'class' => 'input-medium', 
													'style' => 'height: 30px;',
												);
						echo form_input($attributes_input);
				?>
				<p class="help-block">The amount of calories that the dish contains.</p>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="txtItemCatId">Category</label>
			<div class="controls">
				<?php
						echo form_dropdown('category',$select_info,'a');
				?>
				<p class="help-block">The category that the item belongs to.</p>
			</div>
		</div>
		<div class="control-group error">
			<div class="controls" style="padding-top:5px;">
				<?php echo validation_errors('<div class="error help-inline">', '</div>'); ?>
			</div>
		</div>
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">Add Item</button>
		</div>
	</fieldset>
	<?php
		echo form_close();
	?>
</div>
</div>
