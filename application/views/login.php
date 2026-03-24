<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi Stok Barang</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.ico'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1f1c2c, #6c56dbff);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        .login-card h3 {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .btn-login {
            background-color: #b307b3;
            border: none;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #cf1ecf;
        }

        .error-message {
            font-size: 13px;
            color: #ffb3b3;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="login-card text-center">
        <img src="<?= base_url('assets/img/login.png'); ?>" class="logo" alt="Logo">
        <h3>Aplikasi Stok Barang</h3>

        <?php if ($this->session->flashdata('alert')) : ?>
            <div class="alert alert-danger mt-2">
                <?= $this->session->flashdata('alert'); ?>
            </div>
        <?php endif; ?>

        <?= form_open(); ?>

        <div class="form-group text-left">
            <label for="username"><i class="fa fa-user"></i> Username</label>
            <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" name="username" id="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
            <div class="invalid-feedback">
                <?= form_error('username', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>

        <div class="form-group text-left">
            <label for="password"><i class="fa fa-lock"></i> Password</label>
            <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" autocomplete="off" name="password">
            <div class="invalid-feedback">
                <?= form_error('password', '<p class="error-message">', '</p>'); ?>
            </div>
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-login text-white mt-3">Sign In <i class="fa fa-sign-in"></i></button>

        <?= form_close(); ?>
    </div>

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/popper.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>

</html>