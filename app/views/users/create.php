<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roberts Company | Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background-image: radial-gradient(rgba(255,255,255,0.25) 1px, transparent 1px);
      background-size: 25px 25px;
      z-index: 0;
    }
  </style>
</head>
<body class="relative bg-gradient-to-br from-slate-100 via-slate-200 to-slate-300 flex items-center justify-center min-h-screen font-sans">

  <!-- Card -->
  <div class="relative z-10 bg-white p-8 rounded-xl shadow-2xl w-full max-w-md border border-gray-200">
    
    <!-- Company Branding -->
    <div class="text-center mb-6">
      <img src="https://dummyimage.com/80x80/1e3a8a/ffffff&text=R" alt="Roberts Logo" class="mx-auto mb-2 rounded-full shadow-md">
      <h1 class="text-2xl font-bold text-gray-800">Roberts Company</h1>
      <p class="text-sm text-gray-500">User Registration Portal</p>
    </div>

    <!-- Title -->
    <h2 class="text-xl font-semibold text-center mb-6 text-blue-700">Create User</h2>

    <!-- Form -->
    <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-5">
      
      <!-- Username -->
      <div>
        <label for="username" class="block text-gray-700 font-medium mb-1">Username</label>
        <input 
          type="text" 
          id="username" 
          name="username" 
          placeholder="Enter username"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:outline-none"
        >
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-gray-700 font-medium mb-1">Email Address</label>
        <input 
          type="email" 
          id="email" 
          name="email" 
          placeholder="Enter email"
          required
          class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-600 focus:outline-none"
        >
      </div>

      <!-- Buttons -->
      <div class="flex gap-3 pt-2">
        <button type="submit"
          class="flex-1 bg-blue-700 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
           Create Account
        </button>

        <a href="<?= site_url('/'); ?>" 
           class="flex-1 text-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
           Cancel
        </a>
      </div>
    </form>

    <!-- Footer -->
    <p class="mt-6 text-xs text-gray-500 text-center">
      © <?= date('Y'); ?> Roberts Company. All rights reserved.
    </p>
  </div>

</body>
</html>
