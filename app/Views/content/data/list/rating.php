<?php
if (isset($data_buku)) {
    if (count($data_buku) > 0) {
        $no = 0 + $offset;
        foreach ($data_buku as $buku) {
            $no++;
?>
            <tr>
                <td style="text-align: center;vertical-align: middle;"><?= $no ?></td>
                <td style="text-align: center;vertical-align: middle;"><?= $buku['email'] ?></td>
                <td style="text-align: center;vertical-align: middle;"><?= $buku['comment'] ?></td>
                <td style="text-align: center;vertical-align: middle;"><?= $buku['rating'] ?></td>
            </tr>
<?php
        }
    }
}
?>