<div class="row">
	<div class="well">

	<?php 
		$attributes_form = array('id' => 'viewdetails_form');
		echo form_open('order/viewdetails',$attributes_form);
	
		foreach($order_listing as $row) {
			echo '<div class="alert alert-info">';
			echo form_radio('orderId',$row->orderid);
			echo '&nbsp;&nbsp;Table name: ' . $row->tablename . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Total items: '. $row->totalOrder . ')';
			echo '</div>';
		}
	?>
	
		<div class="form-actions">
			<button class="btn btn-primary" type="submit">
				<i class=""></i> 
				View details
			</button>
		</div>
		
		<?php
			echo form_close();
		?>
	</div>
</div>