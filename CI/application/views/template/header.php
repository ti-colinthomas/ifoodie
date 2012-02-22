<html>
	<head>
		<link href="<?php echo base_url(); ?>resources/bootstrap/css/bootstrap.css" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url(); ?>resources/jquery/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.js"></script>
		<script>
			$(document).ready(function() {
				/*$('.nav li').click( function() {
					$(this).addClass('active');
					console.log(this);
				});
				*/
				$('.tabs a:last').tab('show');
				
				
			});
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row" style="padding-top: 10px;">
			<!-- Header content goes here -->
				<div class="span10 offset1">
					<ul class="thumbnails">
						<li class="span10">
							<a href="#" class="thumbnail">
								<img src="<?php echo base_url();?>resources/images/ifoodie_logo.png" style="max-width: 70%">
							</a>
						</li>
					</ul>
				</div>
			</div>
