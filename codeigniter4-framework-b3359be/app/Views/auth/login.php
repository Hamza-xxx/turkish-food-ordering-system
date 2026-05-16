<!DOCTYPE html>
<html>
<head>

    <title>Giriş Yap</title>

    <link rel="stylesheet"
          href="<?= base_url('assets/css/style.css') ?>">

</head>
<body>

<div class="auth-page">

    <div class="glass-card">

        <h2>Giriş Yap</h2>

        <form method="post"
              action="<?= base_url('/login/authenticate') ?>">

            <input type="email"
                   name="email"
                   placeholder="E-Posta"
                   required>

            <input type="password"
                   name="password"
                   placeholder="Şifre"
                   required>

            <button type="submit">
                Giriş Yap
            </button>

        </form>

        <div class="auth-link">

            Hesabın yok mu?

            <a href="<?= base_url('/register') ?>">
                Kayıt Ol
            </a>

        </div>

    </div>

</div>

</body>
</html>