<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roberts Company - Update User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-br from-blue-100 via-blue-200 to-blue-300">

  <!-- Left Side Branding -->
  <div class="hidden md:flex w-1/2 items-center justify-center">
    <div class="text-center text-white p-10">
      <h1 class="text-5xl font-bold mb-4">Roberts Company</h1>
      <p class="text-lg">Update your user details quickly and securely</p>
    </div>
  </div>

  <!-- Right Side Form -->
  <div class="flex-1 flex items-center justify-center p-10">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-10">
      
      <!-- Title -->
      <h2 class="text-3xl font-extrabold mb-6 text-gray-900 text-center">Update User</h2>

      <!-- Form -->
      <form action="<?= site_url('users/update/'.segment(4)); ?>" method="POST" class="space-y-6">
        
        <!-- Username -->
        <div class="relative">
          <input 
            type="text" 
            id="username" 
            name="username"
            value="<?= html_escape($user['username']); ?>"
            required
            class="w-full px-5 pt-6 pb-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:outline-none peer"
            placeholder=" "
          >
          <label for="username" class="absolute left-5 top-2 text-gray-500 text-sm transition-all
            peer-placeholder-shown:top-6 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base
            peer-focus:top-2 peer-focus:text-gray-600 peer-focus:text-sm">
            Username
          </label>
        </div>

        <!-- Email -->
        <div class="relative">
          <input 
            type="email" 
            id="email" 
            name="email"
            value="<?= html_escape($user['email']); ?>"
            required
            class="w-full px-5 pt-6 pb-2 border border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:outline-none peer"
            placeholder=" "
          >
          <label for="email" class="absolute left-5 top-2 text-gray-500 text-sm transition-all
            peer-placeholder-shown:top-6 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base
            peer-focus:top-2 peer-focus:text-gray-600 peer-focus:text-sm">
            Email Address
          </label>
        </div>

        <!-- Buttons -->
        <div class="flex gap-4">
          <button type="submit"
            class="flex-1 bg-gradient-to-r from-purple-500 to-blue-500 hover:from-blue-500 hover:to-purple-500 text-white font-semibold py-3 px-6 rounded-xl shadow-lg transition">
             Save Changes
          </button>
          <a href="<?= site_url('/'); ?>" 
             class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-xl shadow transition text-center">
             Cancel
          </a>
        </div>

      </form>
    </div>
  </div>

</body>
</html>
