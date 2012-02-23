<div descriptor="add-table">
			<fieldset>
				<?php
					$attributes_form = array('id' => 'add_table_form','class'=>'form-horizontal');
					echo form_open('manage/addtable',$attributes_form);
				?>
				<legend>Add Table</legend>
					<div class="control-group">
						<label class="control-label" for="txtAddTable">Table name</label>
						<div class="controls">
							<?php
								$attributes_input = array('name' => 'table_name', 'id' => 'txtAddTable', 'class' => 'input-medium', 'style' => 'height: 30px;');
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