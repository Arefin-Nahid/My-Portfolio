<?php 

echo '
	<div class="sidebar">
		<div id="nav">
			<div id="tab-container">
				<nav class="nav">
					<div> 
						<a href="#" class="nav_logo" > 
						<i class="bx bx-layer nav_logo-icon"></i> 
						<span class="nav_logo-name">Admin Panel</span> </a>
						
						<div class="nav_list"> 
						<a href="#tab-home" class="nav_link active" data-tab="#tab-home"> 
						<i class="bx bx-grid-alt nav_icon"></i> 
						<span class="nav_name">Home</span> </a> 
						
						<a href="#tab-timeline" class="nav_link" data-tab="#tab-timeline"> 
						<i class="bx bx-book-alt nav_icon"></i> 
						<span class="nav_name">Timeline</span> </a> 
						
						<a href="#tab-project" class="nav_link" data-tab="#tab-project"> 
						<i class="bx bx-money-withdraw"></i> 
						<span class="nav_name">Projects</span></a> 
						
						<a href="#tab-achievement" class="nav_link" data-tab="#tab-achievement"> 
						<i class="bx bx-bar-chart-alt-2 nav_icon">
						</i> <span class="nav_name">Achievements</span> </a>
						
						<a href="#tab-travelling" class="nav_link" data-tab="#tab-travelling"> 
						<i class="bx bx-bar-chart-alt nav_icon">
						</i> <span class="nav_name">Travelling</span> </a> 
						
						<a href="#tab-contact" class="nav_link" data-tab="#tab-contact"> 
						<i class="bx bx-atom">
						</i> <span class="nav_name">Contact</span> </a> 
					</div>
							
					<a href="logout.php?logout=yes" class="nav_link"> 
					<i class="bx bx-log-out nav_icon">
					</i> <span class="nav_name">SignOut</span> </a>
				</nav>
			</div>
		</div>
	</div>
';?>
