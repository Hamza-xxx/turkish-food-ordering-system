<!DOCTYPE html>
<html>
<head>

    <title>Türk Restoranı</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/style.css') ?>">

</head>
<body>

<div class="navbar">
    <div class="logo">Turkish Food</div>

    <div>
        <a href="<?= base_url('/') ?>">Ana Sayfa</a>
        <?php if (session()->get('role') !== 'admin'): ?>
    <a href="<?= base_url('/cart') ?>">Sepete get</a>
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

<section class="hero">

    <div class="hero-overlay">

        <h1>Türk Restoranı</h1>

        <p>
            En iyi yemekleri keşfedin
        </p>

        <a class="btn"
           href="<?= base_url('/menu') ?>">

            Menüyü Keşfet

        </a>

    </div>

</section>

<div class="container">

    <div class="section-title">

        <h2>Yemek Kategorileri</h2>

    </div>

    <div class="category-grid">

        <?php foreach ($categories as $category): ?>

            <a class="category-card"
               href="<?= base_url('/menu?category=' . $category['slug']) ?>">

                <img src="<?= $category['image'] ?>">

                <div class="category-overlay">

                    <h3>
                        <?= esc($category['name']) ?>
                    </h3>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>