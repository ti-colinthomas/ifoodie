<?xml version="1.0" encoding="UTF-8"?>
<order failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<orderInfo name="' . $row->name . '" quantity="' . $row->quantity . '" cost="' . $row->cost . '" veg="' . $row->veg . '" cookingtime="' . $row->cookingtime . '" likes="' . $row->likes . '" dislikes="' . $row->dislikes . '" itemid="' . $row->itemid . '"></orderInfo>';
		}
	?>
</order>