<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Roberts Company</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #0b1d3a; /* Solid navy background */
      padding: 20px;
    }

    .glass-container {
      width: 100%;
      max-width: 460px;
      padding: 40px;
      background-color: #ffffff15; /* Slight transparent white */
      backdrop-filter: blur(14px);
      border-radius: 20px;
      border: 1px solid #f5c51850;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.35);
      text-align: center;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Company Name */
    .company-name {
      font-size: 1.9em;
      font-weight: 700;
      color: #f5c518;
      margin-bottom: 5px;
      letter-spacing: 1px;
      text-transform: uppercase;
      text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
    }

    h2 {
      font-size: 1.5em;
      font-weight: 600;
      color: #ffffff;
      margin-bottom: 25px;
      letter-spacing: 0.5px;
    }

    .form-group {
      margin-bottom: 18px;
      position: relative;
      text-align: left;
    }

    .form-group input {
      width: 100%;
      padding: 12px 14px;
      border: 1.5px solid #f5c518;
      border-radius: 12px;
      background: #ffffff;
      color: #0b1d3a;
      font-size: 15px;
      transition: 0.3s ease;
      box-sizing: border-box;
    }

    .form-group input:focus {
      border-color: #1f3a66;
      box-shadow: 0 0 6px rgba(245, 197, 24, 0.4);
      outline: none;
    }

    /* Eye Icon */
    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #1f3a66;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #f5c518;
    }

    /* Button */
    .btn-submit {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background-color: #1f3a66; /* Solid blue */
      color: #fff;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.35);
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-submit:hover {
      background-color: #f5c518;
      color: #0b1d3a;
      transform: translateY(-2px);
    }

    /* Error Message */
    .error-message {
      background: rgba(255, 0, 0, 0.1);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #a70000;
      border-radius: 12px;
      padding: 12px;
      margin-bottom: 18px;
      font-size: 0.9em;
      font-weight: 600;
      text-align: center;
    }

    /* Bottom Text */
    .text-center {
      margin-top: 20px;
      color: #ddd;
    }

    .text-center a {
      color: #f5c518;
      font-weight: 600;
      text-decoration: none;
      transition: 0.3s;
    }

    .text-center a:hover {
      text-decoration: underline;
      color: #fff;
    }

    .footer-note {
      text-align: center;
      margin-top: 25px;
      color: #ccc;
      font-size: 0.9em;
    }
  </style>
</head>
<body>
  <div class="glass-container">
    <div class="company-name">Roberts Company</div>
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('auth/login') ?>">
      <div class="form-group">
        <input type="text" name="username" placeholder="Username" required>
      </div>

      <div class="form-group">
        <input type="password" name="password" id="password" placeholder="Password" required>
        <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
      </div>

      <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="text-center">
      <p>Don’t have an account? 
        <a href="<?= site_url('auth/register'); ?>">Register here</a>
      </p>
    </div>

    <p class="footer-note">© 2025 Roberts Company</p>
  </div>

  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      const type = password.type === 'password' ? 'text' : 'password';
      password.type = type;
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
