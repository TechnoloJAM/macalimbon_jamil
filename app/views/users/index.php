<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Roberts Company - User Directory</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 font-sans">

  <!-- Top Navigation -->
  <nav class="bg-blue-800 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-wide">
        Roberts Company
      </h1>
      <a href="<?= site_url('users/create'); ?>"
         class="bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold px-5 py-2 rounded-lg shadow-md transition">
         + Add User
      </a>
    </div>
  </nav>

  <!-- Main Container -->
  <div class="max-w-7xl mx-auto px-4 py-10">

    <!-- Header Section with Search -->
    <header class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
      <h2 class="text-xl md:text-2xl font-bold text-gray-800">
        User Management System
      </h2>

      <!-- Search Form: send to root (index route) -->
      <form action="<?= site_url('/'); ?>" method="get" class="mt-4 md:mt-0 flex items-center space-x-2">
        <div class="relative">
          <input id="searchInput"
                 class="w-72 md:w-96 pl-4 pr-10 py-2 rounded-lg border border-gray-300
                        focus:ring-2 focus:ring-blue-400 focus:outline-none shadow-sm"
                 name="q" type="text" placeholder="Search users..."
                 value="<?= isset($q) ? html_escape($q) : ''; ?>">
          <button type="button"
                  class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                  aria-label="Clear search"
                  onclick="
                    document.getElementById('searchInput').value='';
                    window.location.href='<?= site_url('/'); ?>';
                  ">
            ✕
          </button>
        </div>
        <button type="submit"
                class="bg-blue-800 hover:bg-blue-900 text-white px-5 py-2 rounded-lg shadow-md transition">
          Search
        </button>
      </form>
    </header>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <table class="min-w-full border-collapse">
        <thead class="bg-blue-800 text-white">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wide">ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wide">Name</th>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wide">Email</th>
            <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wide">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <?php if (!empty($user)): ?>
            <?php foreach ($user as $users): ?>
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4"><?= html_escape($users['id']); ?></td>
                <td class="px-6 py-4 font-medium text-gray-800"><?= html_escape($users['username']); ?></td>
                <td class="px-6 py-4 text-gray-600"><?= html_escape($users['email']); ?></td>
                <td class="px-6 py-4 space-x-2">
                  <a href="<?= site_url('users/update/'.$users['id']);?>"
                     class="inline-block bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-md text-sm font-medium shadow-sm transition">
                     Update
                  </a>
                  <a href="<?= site_url('users/delete/'.$users['id']);?>"
                     class="inline-block bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-sm font-medium shadow-sm transition"
                     onclick="return confirm('Are you sure you want to delete this user?');">
                     Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-center">
      <?= isset($page) ? $page : ''; ?>
    </div>

  </div>
</body>
</html>
