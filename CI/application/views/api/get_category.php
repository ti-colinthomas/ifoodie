<?xml version="1.0" encoding="UTF-8"?>
<CategoryList failure="0" errorMessage="">
<?php
	foreach ($data as $row) {
		echo '<Category id="' . $row->categoryId . '" categoryName="' . $row->categoryName . '"></Category>';
	}
?>
</CategoryList>