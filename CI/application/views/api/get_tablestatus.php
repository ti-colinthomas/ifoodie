<?xml version="1.0" encoding="UTF-8"?>
<tableStatus failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<table tableId="'. $row->tableid .'" status="'.$row->status . '"></table>';
		}
	?>
</tableStatus>