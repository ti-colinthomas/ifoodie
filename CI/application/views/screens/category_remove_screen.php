<div class="row">
	<div class="well">
		<?php 
			foreach($category_listing as $row) {
				echo '<div class="alert alert-info">';
	
				echo '<input type="checkbox" name='.$row->categoryName.' value="'.$row->categoryId.'" checked="">';
				echo '&nbsp;'. $row->categoryName;
				echo '</div>';
			}
		?>
	
		<div class="alert alert-info">
			<input type="checkbox" name="newsletter" value="accept" checked="checked" />
			Category name
		</div>
	</div>
</div>