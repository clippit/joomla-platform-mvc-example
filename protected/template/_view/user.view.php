<?php
/** @var $this LHViewUser */

JFactory::getDocument()->setTitle("View User");
?>

<h2>User #<?php echo $this->model->id; ?></h2>

<ul>
	<li>Name: <?php echo $this->model->name; ?></li>
</ul>