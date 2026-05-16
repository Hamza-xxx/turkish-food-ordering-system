<!DOCTYPE html>
<html>
<head>
    <title>Fiş</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<div class="container">

    <h1>Sipariş Fişi</h1>

    <p><strong>Sipariş No:</strong> #<?= $order['id'] ?></p>

    <p><strong>Tarih:</strong> <?= $order['created_at'] ?></p>

    <hr><br>

    <?php foreach($items as $item): ?>

        <p>
            <?= esc($item['name']) ?>
            × <?= $item['quantity'] ?>
            =
            <?= $item['price'] * $item['quantity'] ?> TL
        </p>

    <?php endforeach; ?>

    <br><hr>

    <h2>Toplam: <?= $order['total'] ?> TL</h2>

    <br>

    <a class="btn" href="<?= base_url('/') ?>">Ana Sayfa</a>

</div>

</body>
</html>