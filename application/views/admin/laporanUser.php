<!DOCTYPE html>
<html>
<head>
	<title>SewPad | Laporan PDF Data User</title>
</head>
<body>
	<center>
		<h1>Laporan Data User</h1>
		<h1>SewPad</h1>
	<table border="2" align="center">
		<thead>
			<tr>
				<th>Id User</th>
				<th>Username</th>
				<th>Email</th>
				<th>Company</th>
				<th>Foto User</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_list as $data): ?>
       			<tr>
          			<td><?php echo $value->id ?></td>
          			<td><?php echo $value->username ?></td>
          			<td><?php echo $value->email ?></td>
          			<td><?php echo $value->company ?></td>
          			<td><?php echo $value->photo ?></td>
       			</tr>
       		<?php endforeach ?>
		</tbody>
	</table>
	</center>
</body>
</html>