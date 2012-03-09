<div class="row">
	<div class="well">
	
		<?php
			$attributes_form = array('id' => 'remove_category_form');
			echo form_open('category/remove_category',$attributes_form);
		?>
	
		<?php 
			foreach($category_listing as $row) {
				echo '<div class="alert alert-info">';
				echo form_checkbox($row->categoryName,$row->categoryId,FALSE);
				echo '&nbsp;&nbsp;&nbsp;'. $row->categoryName . '&nbsp;&nbsp;('.$row->priority.')';
				echo '</div>';
			}
		?>
		
		<div class="form-actions">
			<button class="btn btn-danger" type="submit">
				<i class="icon-trash icon-white"></i> 
				Remove Category
			</button>
		</div>
		
		<?php
			echo form_close();
		?>
		
	</div>
</div>