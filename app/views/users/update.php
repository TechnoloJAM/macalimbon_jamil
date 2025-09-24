<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roberts Company | Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">

  <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-6 text-blue-800">Update User</h1>

    <form id="updateForm" action="<?= site_url('users/update/'.$user['id']); ?>" method="POST" class="space-y-5">
      <div>
        <label for="username" class="block text-gray-700 mb-1">Username</label>
        <input type="text" id="username" name="username"
               value="<?= html_escape($user['username']); ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label for="email" class="block text-gray-700 mb-1">Email</label>
        <input type="email" id="email" name="email"
               value="<?= html_escape($user['email']); ?>" required
               class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="flex gap-3">
        <button type="submit" class="flex-1 bg-blue-700 hover:bg-blue-800 text-white py-2 rounded-lg">
          Update
        </button>
        <a href="<?= site_url('/'); ?>" class="flex-1 text-center bg-gray-400 hover:bg-gray-500 text-white py-2 rounded-lg">
          Cancel
        </a>
      </div>
    </form>

    <!-- Optional: show server flash message (if any) -->
    <?php if (session_status() == PHP_SESSION_NONE) @session_start(); ?>
    <?php if (!empty($_SESSION['flash_message'])): ?>
      <div class="mt-4 text-sm text-gray-700 bg-yellow-100 p-3 rounded">
        <?= html_escape($_SESSION['flash_message']); unset($_SESSION['flash_message']); ?>
      </div>
    <?php endif; ?>
  </div>

  <script>
    // Client-side helper: prevents submit if nothing changed
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('updateForm');
      const orig = {
        username: <?= json_encode($user['username']); ?>,
        email: <?= json_encode($user['email']); ?>
      };

      form.addEventListener('submit', function(e) {
        const username = form.querySelector('[name="username"]').value.trim();
        const email = form.querySelector('[name="email"]').value.trim();

        if (username === orig.username && email === orig.email) {
          e.preventDefault();
          alert('No changes detected. Update cancelled.');
        }
      });
    });
  </script>
</body>
</html>
