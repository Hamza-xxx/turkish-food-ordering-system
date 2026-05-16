<!DOCTYPE html>
<html>
<head>

    <title>Kayıt Ol</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/style.css') ?>">

</head>
<body>

<div class="auth-page">

    <div class="glass-card">

        <h2>Kayıt Ol</h2>

        <form method="post"
              action="<?= base_url('/register/store') ?>">

            <input type="text"
                   name="name"
                   placeholder="Ad Soyad"
                   required>

            <input type="email"
                   name="email"
                   placeholder="E-Posta"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Şifre"
                   required>

            <button type="submit">
                Kayıt Ol
            </button>

        </form>

        <div class="auth-link">

            Hesabın var mı?

            <a href="<?= base_url('/login') ?>">
                Giriş Yap
            </a>

        </div>

    </div>

</div>

</body>
</html>