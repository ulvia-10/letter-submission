<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Laporan Siswa</title>
	<style>
		#outtable {
			padding: 25px;
			border: 3px solid #e3e3e3;
			width: 600px;
			border-radius: 10px;
		}

		.short {
			width: 50px;
		}

		.normal {
			width: 300px;
		}

		table {
			border-collapse: collapse;
			font-family: arial;
			color: #5E5B5C;
		}

		thead th {
			text-align: left;
			padding: 10px;
		}

		tbody td {
			border-top: 3px solid #e3e3e3;
			padding: 10px;
		}

		tbody tr:nth-child even {
			background: #A6F5FA;
		}

		tbody tr:hover {
			background: #EAE9F5;
		}

	</style>
</head>

<body>
	<div id="outtable">
		<h3 style=" text-align: center;">LAPORAN DATA SISWA SMANSA <br>
			TAHUN AJARAN 2019/2020
		</h3>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama </th>
					<th>NISN</th>
					<th>Umur</th>
					<th>Agama</th>
					<th>Tanggal Lahir</th>
					<th>Alamat</th>
					<th>Gender</th>
					<th>Jurusan</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1;
                foreach ($siswa as $kpw): ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $kpw['nama']; ?></td>
					<td><?= $kpw['id_siswa'];?></td>
					<td><?= $kpw['umur'];?></td>
					<td><?= $kpw['agama']; ?></td>
					<td><?= $kpw['tgl_lahir']; ?></td>
					<td><?= $kpw['alamat']; ?></td>
					<td><?= $kpw['gender']; ?></td>
					<td><?= $kpw['jurusan']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>

</html>
