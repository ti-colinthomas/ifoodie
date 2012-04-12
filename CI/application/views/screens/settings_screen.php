<div class="row">
	<div class="well">
		
		<?php
			$attributes_form = array('id' => 'settings_form','class' => 'form-horizontal');
			echo form_open('api_settings/update',$attributes_form);
		?>
		
		<fieldset style="margin-top:10px;">
		<legend>Settings</legend>
		<div class="control-group">
			<label class="control-label" for="txtCategoryName">Order cancel timeout</label>
			<div class="controls">
				<?php
					$attributes_input = array('name' => 'ordercancel_timeout', 'placeholder' => '' . $select_info[0]->masterValue . '' ,'id' => 'txtTimeout', 'class' => 'input-medium', 'style' => 'height: 30px;');
					echo form_input($attributes_input);
				?>
				<p class="help-block">Enter the timeout during which orders placed can be cancelled.</p>
			</div>
		</div>
		<div class="form-actions">
				<button class="btn btn-primary" type="submit">Update Settings</button>
			</div>
		</fieldset>
		
		<?php
			echo form_close();
		?>
	</div>
</div>