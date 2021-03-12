<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
    <div class="row ml-1">
        <div class="col-lg-10">
            <h5 class="ml-3 mt-2">Banyak Data : <?php echo $banyakdata?></h5>
            <h5 class="ml-3">Total Pemasukan : Rp. <?php echo $jumlahtotal?></h5>
        </div>

    </div>

    <table class="table table-bordered mt-1" style="width : 90%; margin-left: 5%; ">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>No Tiket</th>
                <th>Tanggal</th>
                <th>Jenis Kendaraan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($datafilter as $row): ?>
            <tr class="text-center">

                <td><?php echo $no++; ?></td>
                <td><?php echo $row->no_tiket; ?></td>
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->jenis_kendaraan; ?></td>
                <td><?php echo $row->total; ?></td>

            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>