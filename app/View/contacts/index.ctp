	<h1>Contact</h1>
	<p>Texte Texte Texte Texte Texte Texte</p>
<div class="large-6 colomns">
	<?php echo $this->Form->create('Contact'); ?>
		<?php echo $this->Form->input('email') ?>
		<?php echo $this->Form->input('firstname') ?>
		<?php echo $this->Form->input('lastname') ?>
		<?php echo $this->Form->input('title') ?>
		<label>Message</label>
		<?php echo $this->Form->textarea('message', array('rows' => '5', 'cols' => '5')); ?>

	<?php echo $this->Form->end("Envoyer"); ?>
</div>