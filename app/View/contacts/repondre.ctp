
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<div class="large-10 colomns center">

	<h3><?php echo $message['Contact']['title'] ; ?></h3>
	<h5> <?php echo $message['Contact']['email']; ?></h5>
	<p> <?php echo $message['Contact']['message']; ?></p>

	<div class="large-12 colomns center">
		<?php foreach ($reponses as $key => $reponse) { ?>
			<div class="panel" ><?= $reponse['Contact']['message'] ?></div>
		<?php } ?>
	</div>

	<?php echo $this->form->create('Contact'); ?>
		<label>Réponse</label>
		<?php echo $this->Form->textarea('message', array('rows' => '5', 'cols' => '5')); ?>
	<?php echo $this->form->end('Envoyer'); ?>
	 
</div>	