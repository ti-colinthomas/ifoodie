<div class="row">
	<div class="well">
	
		<?php
			$attributes_form = array('id' => 'remove_table_form');
			echo form_open('table/remove_table',$attributes_form);
		?>
	
		<?php 
			foreach($table_listing as $row) {
				echo '<div class="alert alert-info">';
				echo form_checkbox($row->tableName,$row->tableId,FALSE);
				echo '&nbsp;&nbsp;&nbsp;'. $row->tableName . '&nbsp;&nbsp;&nbsp;('. $row->class . ')';
				echo '</div>';
			}
		?>
		
		<div class="form-actions">
			<button class="btn btn-danger" type="submit">
				<i class="icon-trash icon-white"></i> 
				Remove Table
			</button>
		</div>
		
		<?php
			echo form_close();
		?>
		
	</div>
</div>