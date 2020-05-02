<h2>Data Transaksi</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>ID Pembelian</th>
			<th>ID Transaksi</th>
			<th>Nama Pelanggan</th>
			<th>Nama Artikel</th>
			<th>Jumlah Artikel</th>
			<th>Tanggal Transaksi</th>
			<th>Total Trasaksi</th>
			<th>Status</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php
			$ambil=$koneksi -> query("select *from transaksi join produk on transaksi.id_produk=produk.id_produk");
		?>
		<?php
			while($pecah =$ambil->fetch_assoc()){
				?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['id_pembelian']; ?></td>
			<td><?php echo $pecah['id_transaksi'];?></td>
			<td><?php echo $pecah['nama_pelanggan'];?></td>
			<td><?php echo $pecah['nama_produk'];?></td>
			<td><?php echo $pecah['jumlah_beli'];?></td>
			<td><?php echo $pecah['tanggal_transaksi'];?></td>
			<td>Rp.<?php echo number_format($pecah['total_pembayaran']);?></td>
			<td><?php echo $pecah['status']; ?></td>
			<td>
				<a href="index.php?page=detail&id=<?php echo $pecah['id_transaksi']?>" class="btn btn-info">Detail</a>
				<?php if ($pecah['status']!=="pending"): ?>
					<a href="index.php?page=pembayaran&id=<?php echo $pecah['id_pembelian'] ?>" class="btn btn-success">Edit</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++ ?>
		<?php }?>
	</tbody>
</table>