<!DOCTYPE html>
<html>
<head>
    <title>Categories Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Reservasi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>lokasi</th>
                <th>Tanggal</th>
                <th>Nama Hotel</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($category->id); ?></td>
                    <td><?php echo e($category->daerah); ?></td>
                    <td><?php echo e($category->tanggal); ?></td>
                    <td><?php echo e($category->nama_hotel); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH D:\kuliah\semester 3\praktikum\Pemograman Web\hotel-app\resources\views/pemesanan/pdf.blade.php ENDPATH**/ ?>