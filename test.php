<?php
  if ($_POST['text']) {
  	echo $_POST['text'];
  }
?>
<table>
<form action="test.php" method="post">
<tr>
	<td><input type="text" name="text" value="111"></td>
</tr>
	<tr>
		<td>
			<input type="submit" name="submit" value="ok">
		</td>
	</tr>
	
</form>
</table>