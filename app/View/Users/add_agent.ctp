
	<h1>Ajouter un agent</h1>
	<p>Expliquer pourquoi l'inscriprion</p>

	<?php echo $this->Form->create('User'); ?>
	<div class="large-5 colomns left"><?php echo $this->Form->input('username') ?></div>
	<div class="large-6 colomns right"><?php echo $this->Form->input('email') ?></div>
	<div class="large-5 colomns left"><?php echo $this->Form->input('firstname') ?></div>
	<div class="large-6 colomns right"><?php echo $this->Form->input('lastname') ?></div>
	<div class="clear"></div>
	<div class="large-12 colomns"><?php echo $this->Form->input('telephone') ?></div>

	<?php echo $this->Form->end("Enregistrer"); ?>
