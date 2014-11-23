
	<h1>3D Modele</h1>
	<p>Expliquer c'est quoi 3D modele, et pourquoi d'inscrire</p>

	<?php echo $this->Form->create('Demande'); ?>
	<div class="large-5 colomns left">
		<?php echo $this->Form->input('username') ?>
	</div>
	<div class="large-6 colomns right">
		<?php echo $this->Form->input('email') ?>
	</div>
	<div class="large-5 colomns left">
		<?php echo $this->Form->input('firstname') ?>
	</div>
	<div class="large-6 colomns right">
		<?php echo $this->Form->input('lastname') ?>
	</div>
	<div class="large-12 colomns left">
		<?php echo $this->Form->input('telephone') ?>
	</div>
	<div class="large-5 colomns left">
		<?php echo $this->Form->input('entreprise') ?>
	</div>
	<div class="large-6 colomns right">
		<?php echo $this->Form->input('profession') ?>
	</div>
	<div class="large-12 colomns">
		<label>Commentaire</label>
		<?php echo $this->Form->textarea('commentaire', array('rows' => '5', 'cols' => '5')); ?>
	</div>
		
	<?php echo $this->Form->end("Enregistrer la demande"); ?>
</div>