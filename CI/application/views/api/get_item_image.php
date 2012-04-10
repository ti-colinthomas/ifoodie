<?xml version="1.0" encoding="UTF-8"?>
<menuItemIcon failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<ItemImage link="' . base_url() . 'uploads/' . $row->link . '"></ItemImage>';
		}
	?>
</menuItemIcon>