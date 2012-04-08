<?xml version="1.0" encoding="UTF-8"?>
<menuList failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<menuList id="'. $row->itemId .'" name="'. $row->name . '" veg="' . $row->veg . '"></menuList>';
		}
	?>
</menuList>