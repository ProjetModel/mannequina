
	<div class="large-11 colomns center">
				
			 <table style="width:100%">
			  <tr>
			    <th>Username</th>
			    <th>Email</th>
			    <th>Lastname</th>
			    <th>Firstname</th>
			    <th>Telephone</th>
			    <th>Validation</th>
			  </tr>
			  <?php foreach ($demandes as $key => $demande) { ?>
			  <tr>	
			    <td><?php echo $demande['Demande']['username']; ?></td>
			    <td><?php echo $demande['Demande']['email']; ?></td>
			   	<td><?php echo $demande['Demande']['lastname']; ?></td>
			   	<td><?php echo $demande['Demande']['firstname']; ?></td>
			   	<td><?php echo $demande['Demande']['telephone']; ?></td>
			   	<td> <?php echo $this->Html->link($demande['Demande']['valide'],   array('action'=>'valider', $demande['Demande']['id']) ); ?> </td>
                        
			  </tr>
			   <?php } ?>
			</table> 	
	</div>


