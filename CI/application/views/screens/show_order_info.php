<div class="row">
	<div class="well">
		<?php
		foreach($order_listing as $row) {
			echo 'Dish name:    ' . $row->name . '<br />';
			echo 'Table name:   ' . $row->tablename . '<br />';
			echo 'Quantity:     ' . $row->quantity . '<br />';
			echo 'Instructions: ' . $row->instructions . '<br />';
			echo 'Description:  ' . $row->description . '<br />';
			
			echo '<hr />';
		}
		?>
	</div>
</div>