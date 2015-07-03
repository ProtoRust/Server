<!DOCTYPE html>
<html lang="en">
	<head>

		<title>ProtoRust</title>

		<!-- Startup configuration -->
		<link rel="manifest" href="<?php print RELROOT;?>assets/web.manifest">

		<!-- Fallback application metadata for legacy browsers -->
		<meta name="application-name" content="ProtoRust">
		<meta name="author" content="VisionMise">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" sizes="16x16 24x24 32x32 48x48 64x64 72x72 96x96 128x128 256x256" href="<?php print RELROOT;?>assets/img/ico/protorust.ico">

		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Bootstrap theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<!-- Protorust Style -->
		<link rel="stylesheet" href="<?php print RELROOT;?>assets/css/main-style.css">

		<!-- Protorust Script -->
		<script src="<?php print RELROOT;?>assets/js/protorust.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-fixed-top visible-xs">
	      	<div class="container-fluid tight spaceless">
	        	<div class="navbar-header">
	          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
	          		</button>
	        	</div>
	        	<div id="navbar" class="navbar-collapse collapse rusted">
	          		<ul class="nav navbar-nav">
	            		<li class="active"><a href="/">Home</a></li>
	          		</ul>
	          		<ul class="nav navbar-nav navbar-right">
	            		<li><a href="./about/">About</a></li>
	            		<li><a href="./docs/">Docs</a></li>
	            		<li class="active"><a href="./issues/">Issues</a></li>
	            		<li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
	          		</ul>
	        	</div>
	      	</div>
	    </nav>

		<div id="viewport">
			<div class="hidden-xs" style="height:20%;">&nbsp;</div>
			<div class="container-fluid spaceless tight">
				<div class="row-fluid spaceless tight">
					<div class="col-sm-8 col-sm-offset-2 tight">
						<div class="panel panel-body rusted">
							<div class="hidden-xs panel-heading">
								<h2>
									Protorust
									<br>
									<small>A Web Request Framework for OxideMod</small>
								</h2>
							</div>
							<div class="panel-body">
								<h3 class="center">
									Hello. 
									<br>
									My name is Protorust.
								</h3>
								<br>
								<div class="container-fluid tight spaceless">
									<div class="row-fluid center tight spaceless">
										<div class=" panel col-sm-4">
											<h4>Get Protorust</h4>
											<hr style="border-color:#676767;">
											<a class="  -sm -primary center" href="download" style="width:60%;">
												<h4>
												<span class="glyphicon glyphicon-download"></span>
												Download
												</h4>
											</a>
										</div>
										<div class=" panel col-sm-4">
											<h4>Learn More</h4>
											<hr style="border-color:#676767;">
											<a class="  -sm -primary center" href="about" style="width:60%;">
												<h4>
												<span class="glyphicon glyphicon-info-sign"></span>
												About
												</h4>
											</a>
										</div>
										<div class=" panel col-sm-4">
											<h4>Source Code</h4>
											<hr style="border-color:#676767;">
											<a class="  -sm -primary center" href="source" style="width:60%;">
												<h4>
												<span class="glyphicon glyphicon-random"></span>
												GitHub
												</h4>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>