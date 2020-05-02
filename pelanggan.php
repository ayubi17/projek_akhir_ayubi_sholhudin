<h2>Data Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>ID Pelanggan</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama Lengkap</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>No HP</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php
			$ambil=$koneksi -> query("select *from pelanggan");
		?>
		<?php
			while($pecah =$ambil->fetch_assoc()){
				?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['id_pelanggan'];?></td>
			<td><?php echo $pecah['username_pelanggan'];?></td>
			<td><?php echo $pecah['password_pelanggan'];?></td>
			<td><?php echo $pecah['nama_lengkap_pelanggan'];?></td>
			<td><?php echo $pecah['email_pelanggan'];?></td>
			<td><?php echo $pecah['alamat_pelanggan'];?></td>
			<td><?php echo $pecah['no_hp_pelanggan'];?></td>
			<td>
				<a href="index.php?page=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?page=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++ ?>
		<?php }?>
	</tbody>
</table>