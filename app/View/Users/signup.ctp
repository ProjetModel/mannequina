
	<h1>S'inscrire</h1>
	<p>Expliquer pourquoi l'inscriprion</p>
<div class="large-6 colomns">
	<?php echo $this->Form->create('User'); ?>
		<?php echo $this->Form->input('email') ?>
		<?php echo $this->Form->input('password') ?>
		<?php echo $this->Form->input('firstname') ?>
		<?php echo $this->Form->input('lastname') ?>
		<?php echo $this->Form->input('telephone') ?>
		<?php echo $this->Form->input('profession') ?>
		<?php echo $this->Form->input('entreprise') ?>
	<?php echo $this->Form->end("Enregistrer"); ?>
</div>
	

	
