<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update User | Roberts Company</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background-color: #0b1d3a;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .glass-container {
      width: 100%;
      max-width: 500px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(16px);
      border-radius: 20px;
      border: 1px solid rgba(255, 215, 0, 0.3);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      font-size: 2em;
      font-weight: 600;
      color: #f5c518;
      text-align: center;
      margin-bottom: 30px;
      letter-spacing: 1px;
    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #f5c518;
      border-radius: 12px;
      font-size: 14px;
      background: rgba(255, 255, 255, 0.9);
      color: #0b1d3a;
      box-sizing: border-box;
      transition: 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: #1f3a66;
      box-shadow: 0 0 8px rgba(245, 197, 24, 0.5);
      outline: none;
    }

    .toggle-password {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #1f3a66;
    }

    .btn-container {
      display: flex;
      gap: 10px;
      justify-content: center;
    }

    .btn-submit,
    .btn-return {
      flex: 1;
      padding: 14px;
      border: none;
      border-radius: 12px;
      background-color: #f5c518;
      color: #0b1d3a;
      font-size: 1.1em;
      font-weight: 600;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-submit:hover,
    .btn-return:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(245, 197, 24, 0.4);
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
    <h1>Update User</h1>

    <form id="updateForm" action="<?= site_url('users/update/'.$user['id']) ?>" method="POST">
      <div class="form-group">
        <input type="text" name="username" id="username" value="<?= html_escape($user['username']); ?>" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" value="<?= html_escape($user['email']); ?>" placeholder="Email" required>
      </div>

      <?php if(!empty($logged_in_user) && $logged_in_user['role'] === 'admin'): ?>
        <div class="form-group">
          <select name="role" id="role" required>
            <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
          </select>
        </div>

        <!-- New password field -->
        <div class="form-group">
          <input type="password" name="password" id="password" placeholder="Enter new password">
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <!-- Confirm password field -->
        <div class="form-group">
          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm new password">
          <i class="fa-solid fa-eye toggle-password" id="toggleConfirmPassword"></i>
        </div>
      <?php endif; ?>

      <div class="btn-container">
        <button type="submit" class="btn-submit">Update</button>
        <a href="<?= site_url('/users'); ?>" class="btn-return">Cancel</a>
      </div>
    </form>

    <p class="footer-note">© 2025 Roberts Company</p>
  </div>

  <script>
    // Password visibility toggle
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.querySelector(toggleId);
      const input = document.querySelector(inputId);

      if (toggle) {
        toggle.addEventListener('click', function () {
          const type = input.type === 'password' ? 'text' : 'password';
          input.type = type;
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      }
    }

    toggleVisibility('#togglePassword', '#password');
    toggleVisibility('#toggleConfirmPassword', '#confirm_password');

    // SweetAlert validations
    const form = document.getElementById('updateForm');
    const originalData = {
      username: "<?= html_escape($user['username']); ?>",
      email: "<?= html_escape($user['email']); ?>",
      role: "<?= $user['role'] ?? ''; ?>"
    };

    form.addEventListener('submit', function (e) {
      const currentData = {
        username: document.getElementById('username').value.trim(),
        email: document.getElementById('email').value.trim(),
        role: document.getElementById('role') ? document.getElementById('role').value : ''
      };

      const password = document.getElementById('password');
      const confirmPassword = document.getElementById('confirm_password');

      // If no change made
      if (
        currentData.username === originalData.username &&
        currentData.email === originalData.email &&
        currentData.role === originalData.role &&
        (!password || password.value.trim() === "")
      ) {
        e.preventDefault();
        Swal.fire({
          icon: 'info',
          title: 'No changes detected',
          text: 'It looks like you haven’t made any updates.',
          confirmButtonColor: '#f5c518',
          confirmButtonText: 'Okay'
        });
        return;
      }

      // If password entered but confirm doesn't match
      if (password && password.value.trim() !== "" && password.value !== confirmPassword.value) {
        e.preventDefault();
        Swal.fire({
          icon: 'error',
          title: 'Password mismatch',
          text: 'New password and confirmation do not match.',
          confirmButtonColor: '#f5c518'
        });
        return;
      }

      // If new password is same as old (optional check)
      if (password && password.value.trim() !== "" && password.value.trim() === "<?= html_escape($user['password']); ?>") {
        e.preventDefault();
        Swal.fire({
          icon: 'warning',
          title: 'Same as old password',
          text: 'Please enter a new password different from the old one.',
          confirmButtonColor: '#f5c518'
        });
      }
    });
  </script>
</body>
</html>
