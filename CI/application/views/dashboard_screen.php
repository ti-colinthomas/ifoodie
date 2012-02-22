<!-- 
<ul class="nav nav-tabs">
    <li><a href="#category" data-toggle="pill">Category</a></li>
    <li><a href="#dish" data-toggle="tab">Dish</a></li>
    <li><a href="#table" data-toggle="tab">Table</a></li>
	<li><a href="#account" data-toggle="tab">Account</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane active" id="category">
	<?php
		$attributes_form = array('id'=>'addTable');
		form_open('manage/addtable');
		
	?>
	</div>
	<div class="tab-pane" id="dish">dishes</div>
	<div class="tab-pane" id="table">tables</div>
	<div class="tab-pane" id="account">accounts</div>
</div>
-->

<ul class="nav nav-tabs" id="tab">
	<li class="active">
		<a data-toggle="tab" href="#home">Home</a>
	</li>
	<li>
		<a data-toggle="tab" href="#profile">Profile</a>
	</li>
</ul>
<div class="tab-content" id="manageTabContent">
	<div id="home" class="tab-pane fade in active">
		<fieldset>
			<legend>Add tables</legend>
			<?php
				$attributes_form = array('id'=>'addTable');
				form_open('manage/addtable',$attributes_form);
				$attributes_input = array('name=>tableno');
				form_input($attributes_input);			
			?>
			<button class="btn btn-primary" type="submit">Add</button>
		</fieldset>
	</div>
	<div id="profile" class="tab-pane fade">
		<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
	</div>
</div>
     
    <script>
    $(function () {
    $('.tabs a:last').tab('show')
    })
    </script>