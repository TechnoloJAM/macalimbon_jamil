<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Roberts Company | Create User</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #0a1f44 40%, #1b3358 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 30px;
    }

    .card {
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(14px);
      border: 1px solid rgba(212, 175, 55, 0.5);
      max-width: 480px;
      width: 100%;
      color: #fff;
      padding: 2rem 2.5rem;
      animation: fadeIn 0.7s ease-in-out;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(15px);}
      to {opacity: 1; transform: translateY(0);}
    }

    h2 {
      text-align: center;
      color: #d4af37;
      font-weight: 700;
      margin-bottom: 1.5rem;
      letter-spacing: 0.5px;
    }

    label {
      font-weight: 600;
      color: #ffffff;
    }

    input,
    select {
      border-radius: 10px;
      border: 1.5px solid #d4af37;
      padding: 0.65rem 1rem;
      font-size: 1rem;
      color: #0a1f44;
      background: rgba(255, 255, 255, 0.9);
      transition: border-color 0.3s ease;
    }

    input:focus,
    select:focus {
      border-color: #0a1f44;
      box-shadow: 0 0 8px rgba(212, 175, 55, 0.5);
      outline: none;
    }

    .input-with-icon {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-with-icon input {
      padding-right: 2.5rem;
    }

    .input-with-icon i {
      position: absolute;
      right: 14px;
      color: #0a1f44;
      cursor: pointer;
      font-size: 1.1rem;
      transition: color 0.3s ease;
    }

    .input-with-icon i:hover {
      color: #d4af37;
    }

    .btn-create {
      background: linear-gradient(135deg, #0a1f44, #d4af37);
      border: none;
      color: #fff;
      font-weight: 600;
      padding: 0.75rem;
      border-radius: 12px;
      width: 100%;
      font-size: 1.1rem;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
      transition: all 0.3s ease;
    }

    .btn-create:hover {
      transform: translateY(-2px);
      background: linear-gradient(135deg, #d4af37, #0a1f44);
    }

    .error-message {
      background: rgba(255, 0, 0, 0.15);
      border: 1px solid rgba(255, 0, 0, 0.3);
      color: #ff4b4b;
      border-radius: 10px;
      padding: 0.75rem 1rem;
      text-align: center;
      margin-bottom: 1rem;
      font-weight: 600;
      font-size: 0.9rem;
    }

    .btn-back-container {
      margin-top: 1.5rem;
      text-align: center;
    }

    .btn-back {
      color: #fff;
      font-weight: 600;
      text-decoration: none;
      border: 1.5px solid #d4af37;
      padding: 0.5rem 1.75rem;
      border-radius: 10px;
      display: inline-block;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.1);
    }

    .btn-back:hover {
      background: #d4af37;
      color: #0a1f44;
      text-decoration: none;
    }

    .logo-header {
      text-align: center;
      margin-bottom: 1.2rem;
      font-size: 1.5rem;
      color: #fff;
    }

    .logo-header i {
      color: #d4af37;
      margin-right: 8px;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="logo-header">
      <i class="fa-solid fa-building"></i> Roberts Company
    </div>
    <h2>Create User</h2>

    <?php if (!empty($error)) : ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('users/create'); ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required
          value="<?= isset($username) ? html_escape($username) : '' ?>" class="form-control" />
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter email" required
          value="<?= isset($email) ? html_escape($email) : '' ?>" class="form-control" />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-with-icon">
          <input type="password" name="password" id="password" placeholder="Enter password" required class="form-control" />
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>
      </div>

      <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <div class="input-with-icon">
          <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm password" required class="form-control" />
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>
      </div>

      <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select name="role" id="role" required class="form-control">
          <option value="" disabled <?= !isset($role) ? 'selected' : '' ?>>-- Select Role --</option>
          <option value="admin" <?= isset($role) && $role == "admin" ? 'selected' : '' ?>>Admin</option>
          <option value="user" <?= isset($role) && $role == "user" ? 'selected' : '' ?>>User</option>
        </select>
      </div>

      <button type="submit" class="btn-create">Create User</button>
    </form>

    <div class="btn-back-container">
      <a href="<?= site_url('users'); ?>" class="btn-back">Back</a>
    </div>
  </div>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.type === 'password' ? 'text' : 'password';
        input.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
