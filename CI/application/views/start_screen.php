<div class="row">
	<div class="span3 offset2">
	<!-- Fill in some content here -->
		The artistic flavors of Italy come to life inside this culinary art house. Guests can enjoy a lively show kitchen while feasting on fresh pastas, homemade bread, and delicious hand-tossed pizzas. Our outdoor dining area provides a relaxing setting for a perfect meal experience. Share a bottle of premium wine alfresco for a magical journey to the hues, aromas, and flavors of Italy. Whether it’s a quick meeting over a pizza or a romantic encounter over cheesy, saucy pasta, Prego fits all occasions.
	</div>
	
	<!-- Login mechanism goes in here -->
	<div class="span4 offset1">
		<?php
			$attributes_form = array('class' => 'well form-search', 'id' => 'login_form', 'style' => 'padding-bottom: 10px;');
			echo form_open('start/login',$attributes_form);
		?>
		<div id="divUserName" class="control-group">
			<div class="controls">
				<?php
					$attributes_input = array('name' => 'username', 'placeholder' => 'Username' ,'id' => 'txtUserName', 'class' => 'input-medium', 'style' => 'height: 30px;');
					echo form_input($attributes_input);
				?>
			</div>
		</div>
		<div id="divPassWord" class="control-group">
			<div class="controls">
				<?php
					$attributes_input = array('name' => 'password', 'placeholder' => 'Password' ,'id' => 'txtPassWord', 'class' => 'input-medium', 'style' => 'margin-top: 15px; height: 30px;');
					echo form_password($attributes_input);
				?>
			</div>	
		</div>
		<button class="btn btn-primary" type="submit" style="height: 80px; margin-left: 180px; margin-bottom: 0px; margin-top: -90px; width: 80px;">Login</button>
		<div class="control-group error">
			<div class="controls" style="padding-top:5px;">
				<?php echo validation_errors('<div class="error help-inline">', '</div>'); ?>
			</div>
		</div>
		<?php
			echo form_close();
		?>
	</div>
</div>