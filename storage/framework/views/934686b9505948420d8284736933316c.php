<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD reservasi</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">\
</head>
<body>
    <h1>CRUD reservasi</h1>

    <h3><?php echo e(isset($edit_data) ? 'Edit Data' : 'Tambah Data'); ?></h3>
    <form action="<?php echo e(isset($edit_data) ? route('reservasi.update', $edit_data->id) : route('reservasi.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label>Daerah:</label>
        <input type="text" name="daerah" value="<?php echo e($edit_data->nama_pemesanan ?? ''); ?>" required>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="<?php echo e($edit_data->tanggal ?? ''); ?>" required>
        <label>Nama Hotel:</label>
        <input type="text" name="nama_hotel" value="<?php echo e($edit_data->jenis_pesawat ?? ''); ?>" required>
        <button type="submit"><?php echo e(isset($edit_data) ? 'Update' : 'Simpan'); ?></button>
    </form>

    <a href="<?php echo e(route('reservasi.cetakPdf')); ?>" target="_blank">Cetak PDF</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Daerah</th>
                <th>Tanggal</th>
                <th>Nama Hotel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($row->id); ?></td>
                    <td><?php echo e($row->nama_pemesanan); ?></td>
                    <td><?php echo e($row->tanggal); ?></td>
                    <td><?php echo e($row->jenis_pesawat); ?></td>
                    <td>
                        <a href="<?php echo e(route('reservasi.edit', $row->id)); ?>">Edit</a>
                        <a href="<?php echo e(route('reservasi.destroy', $row->id)); ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH D:\kuliah\semester 3\praktikum\Pemograman Web\hotel-app\resources\views\layout\app.blade.php ENDPATH**/ ?>