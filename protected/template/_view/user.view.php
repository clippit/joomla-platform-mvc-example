<?php
/** @var $this LHViewUser */

JFactory::getDocument()->setTitle("View User");
?>

<h2>User #<?php echo $this->model->id; ?></h2>

<dl>
  <dt>Name</dt>
  <dd><?php echo $this->model->name; ?></dd>
</dl>
