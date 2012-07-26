<?php
/** @var $this LHViewUser */

JFactory::getDocument()->setTitle("Users");
?>

<h2>All Users</h2>

<table>
	<?php foreach ($this->userList as $user): ?>
		<tr>
			<td><a href="<?php echo $user->id; ?>"><?php echo $user->id; ?></a></td>
			<td><?php echo $user->name; ?></td>
		</tr>
	<?php endforeach; ?>
</table>