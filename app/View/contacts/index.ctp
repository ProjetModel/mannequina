	<h1>Contact</h1>
	<p>Texte Texte Texte Texte Texte Texte</p>


		<div class="large-12 colomns"><?php echo $this->Form->create('Contact'); ?></div>
		<div class="large-12 colomns"><?php echo $this->Form->input('email') ?></div>

		<div class="large-5 colomns left" >
			<?php echo $this->Form->input('firstname') ?>
		</div>
		<div class="large-6 colomns right" >
			<?php echo $this->Form->input('lastname') ?>
		</div>
		<div class="clear"></div>
		<div class="large-12 colomns"><?php echo $this->Form->input('title') ?></div>
		<div class="large-12 colomns">
			<label>Message</label>
			<?php echo $this->Form->textarea('message', array('rows' => '5', 'cols' => '5')); ?>
		</div>


	<?php echo $this->Form->end("Envoyer", array('class' => 'button')); ?>


