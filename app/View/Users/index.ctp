<div class="users form">
<h1>Users</h1>
<table class="center">
    <thead>
        <tr>
            <th><?php echo $this->Form->checkbox('all', array('name' => 'CheckAll',  'id' => 'CheckAll')); ?></th>
            <th><?php echo $this->Paginator->sort('Username', 'Username');?>  </th>
            <th><?php echo $this->Paginator->sort('E-mail', 'E-Mail');?></th>
            <th><?php echo $this->Paginator->sort('FirstName', 'FirstName');?></th>
            <th><?php echo $this->Paginator->sort('LastName','LastName');?></th>
            <th><?php echo $this->Paginator->sort('Telephone','Telephone');?></th>
            <th><?php echo $this->Paginator->sort('Profession','Profession');?></th>
            <th><?php echo $this->Paginator->sort('Entreprise','Entreprise');?></th>
            <th><?php echo $this->Paginator->sort('Status','Status');?></th>
            <th><?php echo $this->Paginator->sort('Valide','Valide');?></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>                       
        <?php $count=0; ?>
            <?php foreach($users as $user): ?>  
                <?php if($user['User']['statut'] != 3){ ?>          
                    <?php $count ++;?>
                    <?php if($count % 2): echo '<tr>'; else: echo '<tr class="zebra">' ?>
                    <?php endif; ?>
                        <td><?php echo $this->Form->checkbox('User.id.'.$user['User']['id']); ?></td>
                        <td><?php echo $this->Html->link( $user['User']['username']  ,   array('action'=>'profil', $user['User']['id']),array('escape' => false) );?></td>
                        <td style="text-align: center;"><?php echo $user['User']['email']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['firstname']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['lastname']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['telephone']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['profession']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['entreprise']; ?></td>
                        <td style="text-align: center;"><?php echo $user['User']['statut']; ?></td>
                        <td> <?php echo $this->Html->link($user['User']['valide'],   array('action'=>'validation', $user['User']['id']) ); ?> </td>
                        <td >
                        <?php echo $this->Html->link(    "Edit",   array('action'=>'edit', $user['User']['id']) ); ?> | 
                        <?php
                            if( $user['User']['statut'] != 0){ 
                                echo $this->Html->link(    "Delete", array('action'=>'delete', $user['User']['id']));}
                        ?>
                        </td>
                    </tr>
                    <?php } ?>
            <?php endforeach; ?>    
        <?php unset($user); ?>
    </tbody>
</table>

<ul class="pagination" role="menubar" aria-label="Pagination">
    <?php echo $this->Paginator->prev('<< ' . __('previous', false), array('tag' => 'li'), null, array('class'=>''));?>
    <?php echo $this->Paginator->numbers(array(   'class' => 'numbers', 'tag' => 'li'));?>
    <?php echo $this->Paginator->next(__('next', false) . ' >>', array('tag' => 'li'), null, array('class' => ''));?>
</ul>

</div>
<br>                
<?php echo $this->Html->link( "Add A New User.",   array('action'=>'addAgent'),array('escape' => false) ); ?>
<br/>
<?php 
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
?>

<script type="text/javascript">
    function activer(id){
         
        $.ajax({
           url : './Users/activer',
           type : 'POST', // Le type de la requête HTTP, ici devenu POST
           data : 'id=' + id , // On fait passer nos variables, exactement comme en GET, au script more_com.php
           dataType : 'html'
        });
       
    });
</script>