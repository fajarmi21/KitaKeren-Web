<?php
if (isset($data_buku)) {
    if (count($data_buku) > 0) {
        $no = 0 + $offset;
        foreach ($data_buku as $buku) {
            $no++;
?>
            <tr>
                <td style="text-align: center;vertical-align: middle;"><?= $no ?></td>
                <td style="text-align: center;vertical-align: middle;"><?= $buku['nama_detailDashboard']['ind'] ?></td>
                <td style="text-align: center;vertical-align: middle;"><?= $buku['nama_detailDashboard']['en'] ?></td>
                <td style="text-align: center;"><img src="<?= base_url($buku['icon_detailDashboard']); ?>" width="50" height="50" /></td>
                <td style="text-align: center;">
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                        <span class="sr-only">Toggle Dropdown</span>
                        <div class="dropdown-menu" role="menu">
                            <?php
                                if ($buku['sub_detailDashboard'] == 1) {
                                    echo '<a href="#" class="subdetail-data dropdown-item" data-id='. $buku['id_detailDashboard'] .'>Detail</a>';
                                } else {
                                    echo '<a href="#" class="detail-data dropdown-item" data-id=' . $buku['id_detailDashboard'] . '>Detail</a>';
                                }           
                            ?>
                            <a href="#" class="edit-data dropdown-item" data-id="<?= $buku['id_detailDashboard'] ?>">Edit</a>
                            <a href="#" class="hapus-data dropdown-item" data-id="<?= $buku['id_detailDashboard'] ?>">Delete</a>
                        </div>
                    </button>
                </td>
            </tr>
<?php
        }
    }
}
?>