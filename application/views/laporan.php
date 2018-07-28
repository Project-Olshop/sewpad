<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>
<body>
    <h1><?php echo "Laporan $title" ?> </h1>
    <table border="3" align="center">
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
			<?php foreach ($users_list as $data): ?>
       			<tr>
          			<td><?php echo $data->id ?></td>
          			<td><?php echo $data->username ?></td>
          			<td><?php echo $data->email ?></td>
                    <td><?php echo $data->company ?></td>
                    <td><?php echo $data->photo ?></td>
       			</tr>
       		<?php endforeach ?>
		</tbody>


    </table>
    </center>
    

</body>
</html>