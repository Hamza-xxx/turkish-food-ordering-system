<!DOCTYPE html>
<html>
<head>
    <title>Menü</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<div class="navbar">
    <div class="logo">Turkish Food</div>

    <div>
        <a href="<?= base_url('/') ?>">Ana Sayfa</a>
        <?php if (session()->get('role') !== 'admin'): ?>
    <a href="<?= base_url('/cart') ?>">Sepete git</a>
<?php endif; ?>

        <?php if (session()->get('role') === 'admin'): ?>
            <a href="<?= base_url('/admin/dashboard') ?>">Admin Panel</a>
        <?php endif; ?>

        <?php if (session()->get('logged_in')): ?>
            <span>Merhaba, <?= esc(session()->get('user_name')) ?></span>
            <a href="<?= base_url('/logout') ?>">Çıkış</a>
        <?php else: ?>
            <a href="<?= base_url('/login') ?>">Giriş</a>
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <h1>Menü</h1>

    <div class="food-grid">
        <?php foreach ($foods as $food): ?>

            <div class="food-card">
                <img src="<?= base_url('uploads/foods/' . $food['image']) ?>" alt="<?= esc($food['name']) ?>">

                <div class="food-card-content">
                    <h3><?= esc($food['name']) ?></h3>

                    <p><?= esc($food['description']) ?></p>

                    <strong><?= esc($food['price']) ?> TL</strong>

                             <?php if (session()->get('role') !== 'admin'): ?>
                               <form action="<?= base_url('/cart/add/' . $food['id']) ?>" method="post">
                               <label>Adet:</label>
                                <input type="number" name="qty" value="1" min="1">
                             <button class="btn" type="submit">Sepete Ekle</button>
                     </form>
                 <?php endif; ?>

                    <?php if (session()->get('role') === 'admin'): ?>
                        <a class="btn delete-btn"
                           onclick="return confirm('Bu yemeği silmek istiyor musun?')"
                           href="<?= base_url('/admin/delete-food/' . $food['id']) ?>">
                            Sil
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

</body>
</html>