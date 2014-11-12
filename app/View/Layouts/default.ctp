
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $this->fetch('title'); ?>
  </title>

  <?php
    //echo $this->Html->meta('icon');

    //echo $this->Html->css('cake.generic');

    //echo $this->fetch('meta');
    //echo $this->fetch('css');
    //echo $this->fetch('script');
  ?>

	<title>Agence de mannequin</title>
	<link rel="stylesheet" type="text/css" href="css/foundation.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
 	 <!-- fichier css -->
  <link rel="stylesheet" href="css/style.css">

  <script src="js/vendor/modernizr.js"></script>

</head>
<body>

<div class="row">
  <div class="large-12 colomns">
   <div class="header">
    
      <div class="large-4 logo ">Logo</div>
      <div class="large-8 menu">
        <ul>
          <li>Menu1</li>
          <li>Menu2</li>
          <li>Menu3</li>
          <li>Menu4</li>
        </ul>
      
      </div>
   </div>

    <div class="container">
      <?php echo $this->fetch('content'); ?>
    </div>
    <div class="footer"></div>
  </div>
</div>


</body>
</html>