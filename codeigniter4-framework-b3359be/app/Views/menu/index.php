<!DOCTYPE html>
<html>
<head>
    <title>Menü</title>
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"></head>
<body>

<div class="navbar">
    <div class="logo">Turkish Food</div>

    <div>
        <a href="<?= base_url('/') ?>">Ana Sayfa</a>
        <a href="<?= base_url('/menu') ?>">Menü</a>
        <a href="#">Giriş</a>
    </div>
</div>

<div class="container">
    <h1>Menü</h1>

    <div class="food-grid">

    <?php foreach ($foods as $food): ?>

        <div class="food-card">
            <img src="<?= base_url('uploads/foods/' . $food['image']) ?>" alt="<?= esc($food['name']) ?>">

            <h3><?= esc($food['name']) ?></h3>

            <p><?= esc($food['description']) ?></p>

            <strong><?= esc($food['price']) ?> TL</strong>

            <br><br>

            <a class="btn" href="#">Sepete Ekle</a>
        </div>

    <?php endforeach; ?>

</div>
</div>

</body>
</html>