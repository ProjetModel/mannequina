
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $this->fetch('title'); ?>
  </title>

  <?php
    //echo $this->Html->meta('icon');

  echo $this->Html->css('foundation.min');
  echo $this->Html->css('normalize');
  echo $this->Html->css('style');

    //echo $this->fetch('meta');
    //echo $this->fetch('css');
    //echo $this->fetch('script');
  ?>

	<title>Agence de mannequin</title>

  <script src="js/vendor/modernizr.js"></script>

</head>
<body>

<div class="row">
  <div class="large-12 colomns">
   <div class="header colomns large-12">
    
      <div class="colomns large-4 logo ">Logo</div>
      <div class="colomns large-8 menu">
        <ul>
          <li><a href="./signup">Home</a></li>
          <li><a href="#">Mannequins</a></li>
          <li><a href="#">About</a></li>
          <li><a href="./signup">S'inscrire</a></li>
        </ul>
      
      </div>
   </div>

    <div class="container colomns large-12">
      <?php echo $this->fetch('content'); ?>
    </div>
    <div class="footer colomns large-12"></div>
  </div>
</div>


</body>
</html>