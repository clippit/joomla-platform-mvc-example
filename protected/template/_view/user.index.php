<?php
/** @var $this LHViewUser */

JFactory::getApplication()->getTemplate()->buffer->set('page.header.title', "Users");
?>

<h2>All Users</h2>

<table border="1" cellspacing="0" cellpadding="0">
	<?php foreach ($this->userList as $user): ?>
		<tr>
			<td><a href="<?php echo $user->id; ?>"><?php echo $user->id; ?></a></td>
			<td><?php echo $user->name; ?></td>
		</tr>
	<?php endforeach; ?>
</table>