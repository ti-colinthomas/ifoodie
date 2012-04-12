<?xml version="1.0" encoding="UTF-8"?>
<tableList failure="0" errorMessage="">
	<?php
		foreach ($data as $row) {
			echo '<table tableId="'. $row->tableId .'" tableName="'.$row->tableName . '" deviceId="'. $row->deviceIdentifier . '"></table>';
		}
	?>
</tableList>