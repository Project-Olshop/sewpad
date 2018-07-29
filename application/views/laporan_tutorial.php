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
				<th>Id Tutorial</th>
				<th>Judul Tutorial</th>
				<th>Kategori</th>
                <th>Penulis</th>
				<th>Foto Hasil</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tutorial_list as $data): ?>
       			<tr>
          			<td><?php echo $data['idTutorial']; ?></td>
          			<td><?php echo $data['nama_tutorial']; ?></td>
          			<td><?php echo $data['kategori']; ?></td>
                    <td><?php echo $data['username']; ?></td>
					<td><img src="<?php echo base_url(); ?>assets/img/<?php echo $data['photo_hasil']; ?>" alt="" width="100"></td>
				</tr>
       		<?php endforeach ?>
		</tbody>


    </table>
    </center>
    

</body>
</html>