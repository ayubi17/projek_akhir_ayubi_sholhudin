<h2>Data Produk</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Id Produk</th>
			<th>Nama Produk</th>
			<th>Stock</th>
			<th>Harga</th>
			<th>Detail</th>
			<th>Foto</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php
			$ambil=$koneksi -> query("select *from produk");
		?>
		<?php
			while($pecah =$ambil->fetch_assoc()){
				?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['id_produk'];?></td>
			<td><?php echo $pecah['nama_produk'];?></td>
			<td><?php echo $pecah['stock'];?></td>
			<td><?php echo $pecah['harga_produk'];?></td>
			<td><?php echo $pecah['detail'];?></td>
			<td>
				<img src="../Foto/<?php echo $pecah['foto'];?>" width="100">
			</td>
			<td>
				<a href="index.php?page=hapusproduk&id=<?php echo $pecah['id_produk'];?>" class="btn-danger btn">Hapus</a>
				<a href="index.php?page=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++ ?>
		<?php }?>
	</tbody>
</table>
<a href="index.php?page=tambahproduk" class="btn btn-info">Tambah Data</a>