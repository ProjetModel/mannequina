<div class="colomns large-5 center">
	
		<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend><?php echo __('Saisissez votre nom d\'utilisateur et votre mot de passe'); ?></legend>
		        <?php echo $this->Form->input('username');
		        echo $this->Form->input('password');
		    ?>
		    </fieldset>
		<?php echo $this->Form->end(__('Login')); ?>
</div>
