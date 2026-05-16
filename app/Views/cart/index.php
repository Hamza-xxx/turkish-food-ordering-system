<!DOCTYPE html>
<html>
<head>
    <title>Sepet</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<div class="navbar">
    <div class="logo">Turkish Food</div>

    <div>
        <a href="<?= base_url('/') ?>">Ana Sayfa</a>
        <a href="<?= base_url('/cart') ?>">Sepet</a>
        <a href="<?= base_url('/logout') ?>">Çıkış</a>
    </div>
</div>

<div class="container">

    <h1>Sepetim</h1>

    <?php if(empty($cart)): ?>

        <p>Sepet boş.</p>

    <?php else: ?>

        <div class="food-grid">

            <?php $total = 0; ?>

            <?php foreach($cart as $item): ?>

                <?php
                    $subtotal = $item['price'] * $item['qty'];
                    $total += $subtotal;
                ?>

                <div class="food-card">

                    <img src="<?= base_url('uploads/foods/' . $item['image']) ?>">

                    <div class="food-card-content">

                        <h3><?= esc($item['name']) ?></h3>

                        <p>Adet: <?= $item['qty'] ?></p>

                        <strong><?= $subtotal ?> TL</strong>

                        <br><br>

                        <a class="btn delete-btn"
                           href="<?= base_url('/cart/remove/' . $item['id']) ?>">
                            Sil
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <br>

        <form action="<?= base_url('/cart/apply-coupon') ?>" method="post">

            <input type="text"
                   name="coupon"
                   placeholder="Kupon Kodu">

            <button class="btn">
                Uygula
            </button>

        </form>

        <?php

            $discount = session()->get('discount') ?? 0;

            $discountAmount = ($total * $discount) / 100;

            $finalTotal = $total - $discountAmount;

        ?>

        <div style="margin-top:35px; display:flex; align-items:center; gap:20px; flex-wrap:wrap;">

            <div>

                <h2 style="margin:0;">
                    Toplam: <?= $finalTotal ?> TL
                </h2>

                <?php if($discount > 0): ?>

                    <p style="color:green; font-weight:bold;">
                        İndirim: %<?= $discount ?>
                    </p>

                <?php endif; ?>

            </div>

            <a class="btn" href="<?= base_url('/checkout') ?>">
                Siparişi Tamamla
            </a>

        </div>

    <?php endif; ?>

</div>

</body>
</html>