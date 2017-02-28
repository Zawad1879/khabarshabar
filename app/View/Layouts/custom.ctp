<?php
	echo $this->Html->meta('icon');
  echo $this->Html->css('style.generic');
  echo $this->fetch('meta');
  echo $this->fetch('css');
  echo $this->fetch('script'); ?>
<?php echo $this->fetch('content'); ?>
