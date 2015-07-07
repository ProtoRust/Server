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
		<div id="viewport">
			<div class="hidden-xs" style="height:20%;">&nbsp;</div>
			<div class="container-fluid spaceless tight">
				<div class="row-fluid spaceless tight">
					<div class="col-sm-8 col-sm-offset-2 tight">
						<div class="panel panel-default " id="page">
							%page%
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>