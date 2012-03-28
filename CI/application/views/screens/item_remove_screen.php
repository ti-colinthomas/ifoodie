<div class="row">
	<div class="well">
	
		<?php
			$attributes_form = array('id' => 'remove_item_form');
			echo form_open('item/remove_item',$attributes_form);
		?>
	
		<?php 
			foreach($item_listing as $row) {
				echo '<div class="alert alert-info">';
				echo form_checkbox($row->name,$row->itemId,FALSE);
				echo '&nbsp;&nbsp;&nbsp;'. $row->name . '&nbsp;&nbsp;('.$row->cost.')';
				echo '</div>';
			}
		?>
		
		<div class="form-actions">
			<button class="btn btn-danger" type="submit">
				<i class="icon-trash icon-white"></i> 
				Remove Item
			</button>
		</div>
		
		<?php
			echo form_close();
		?>
		
	</div>
</div>