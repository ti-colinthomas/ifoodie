<?xml version="1.0" encoding="UTF-8"?>
<masters failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<settings timeout="'. $row->masterValue .'"></settings>';
		}
	?>
</masters>