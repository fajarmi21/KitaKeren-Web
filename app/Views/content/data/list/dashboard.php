<?php
if (isset($data_buku)) {
	if (count($data_buku) > 0) {
		$no = 0 + $offset;
		foreach ($data_buku as $buku) {
			$no++;
?>
			<tr>
				<td style="text-align: center;vertical-align: middle;"><?= $no ?></td>
				<?php foreach($buku['nama_dashboard'] as $k => $v) :  ?>
					<td style="text-align: center;vertical-align: middle;"><?= $v ?></td>
				<?php endforeach; ?>
				<td style="text-align: center;"><img src="<?= base_url($buku['icon_dashboard']); ?>" width="50" height="50" /></td>
				<td style="text-align: center;">
					<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
						<span class="sr-only">Toggle Dropdown</span>
						<div class="dropdown-menu" role="menu">
							<a href="#" class="detail-data dropdown-item" data-id="<?= $buku['id_dashboard'] ?>">Detail</a>
							<a href="#" class="edit-data dropdown-item" data-id="<?= $buku['id_dashboard'] ?>">Edit</a>
							<a href="#" class="hapus-data dropdown-item" data-id="<?= $buku['id_dashboard'] ?>">Delete</a>
						</div>
					</button>
				</td>
			</tr>
<?php
		}
	}
}
?>