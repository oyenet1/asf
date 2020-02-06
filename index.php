<!doctype html>
<html>
	<head>
		<title>Asf-uniabuja</title>
		<style>
			.row {
				display: flex;
				flex-wrap: wrap;
			}
			.column25 {
				flex: 25%;
				padding: 5px;
			}

			.column50 {
				flex: 50%;
				padding: 5px;
			}
			
			/* Ensure proper sizing */
				* {
				  box-sizing: border-box;
				}
			footer {
				clear: both;
			}
		</style>
	</head>
	<body>
		<!-- Header Section #1-->
		<header style="background: url(image/uniabuja.png) no-repeat fixed center;">
			<?php include('header.php'); ?>
		</header>
		
		<div class="row">
			<div class="column25">
				<!-- Body Section #2-->
				<section>
					<?php include('newsletter.php'); ?>
				</section>
			</div>

			<div class="column50">
				<!-- Body Section #2-->
				<article>
					<?php include('scholar.php'); ?>
				</article>
			</div>
				
			<div class="column25">
				<!-- Body Section #3-->
				<aside>
					<?php include('comment.php'); ?>
				</aside>
			</div>
		</div>
			
			<!-- Footer Content Section #4-->
				<footer>
					<?php include('footer.php'); ?>
				</footer>
			
		
	</body>
</html>