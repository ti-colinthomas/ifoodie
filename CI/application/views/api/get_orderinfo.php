<?xml version="1.0" encoding="UTF-8"?>
<order failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<orderInfo orderid="' . $row->orderId . '"></ItemImage>';
		}
	?>
</order>