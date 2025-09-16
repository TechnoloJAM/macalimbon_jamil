<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roberts Company - Create User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex">

  <!-- Left side: Branding / Illustration -->
  <div class="hidden md:flex w-1/2 bg-gradient-to-br from-blue-600 to-purple-600 items-center justify-center">
    <div class="text-center text-white p-10">
      <h1 class="text-5xl font-bold mb-4">Roberts Company</h1>
      <p class="text-lg">Manage your users efficiently and securely</p>
    </div>
  </div>

  <!-- Right side: Form -->
  <div class="flex-1 flex items-center justify-center p-10">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg p-10">
      
      <!-- Title -->
      <h2 class="text-3xl font-extrabold mb-6 text-gray-900 text-center">Create User Account</h2>
      
      <!-- Subtitle -->
      <p class="text-center text-gray-500 mb-8">Fill in your details to get started</p>

      <!-- Form -->
      <form action="<?= site_url('users/create'); ?>" method="POST" class="space-y-6">

        <!-- Username -->
        <div>
          <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
          <input 
            type="text" 
            id="username" 
            name="username" 
            placeholder="Enter username"
            required
            class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
          >
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            placeholder="Enter email"
            required
            class="w-full px-5 py-3 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
          >
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
          <button type="submit"
            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition">
            Create Account
          </button>
          <a href="<?=site_url('/')?>"
             class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-xl shadow transition text-center">
             Back
          </a>
        </div>

      </form>
    </div>
  </div>

</body>
</html>
