<?php 

	foreach ($messages as $key => $message) {
		?>
			<div class="large-10 colomns center">
				<h3><?php echo $message['Contact']['title'] ; ?></h3>
				<h5> <?php echo $message['Contact']['email']; ?></h5>
				<p> <?php echo $message['Contact']['message']; ?></p>
				<span class="right">
				 <?php echo $this->Html->link("Répondre",   array('controller' => 'Contacts','action'=>'repondre', $message['Contact']['id']) ); ?> 
				 </span>
				 
			</div>	
		<?php
	}


 ?>