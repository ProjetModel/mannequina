<?php 

	foreach ($messages as $key => $message) {
		?>
			<div class="large-10 colomns center">
				<h3><?php echo $message['Contact']['title'] ; ?></h3>
				<h5> <?php echo $message['Contact']['email']; ?></h5>
				<p> <?php echo $message['Contact']['message']; ?></p>
			</div>	
		<?php
	}


 ?>