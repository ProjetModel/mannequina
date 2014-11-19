
	<h1>3D Modele</h1>
	<p>Expliquer c'est quoi 3D modele, et pourquoi d'inscrire</p>
<div class="large-6 colomns">
	<?php echo $this->Form->create('Demande'); ?>
		<?php echo $this->Form->input('username') ?>
		<?php echo $this->Form->input('email') ?>
		<?php echo $this->Form->input('firstname') ?>
		<?php echo $this->Form->input('lastname') ?>
		<?php echo $this->Form->input('telephone') ?>
		<?php echo $this->Form->input('profession') ?>
		<?php echo $this->Form->input('entreprise') ?>
		<label>Commentaire</label>
		<?php echo $this->Form->textarea('commentaire', array('rows' => '5', 'cols' => '5')); ?>

	<?php echo $this->Form->end("Enregistrer la demande"); ?>
</div>