<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Roberts Company - User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(135deg, #E0F7FA 0%, #B2EBF2 50%, #80DEEA 100%);
    }
  </style>
</head>
<body class="min-h-screen flex flex-col items-center p-6 font-sans">

  <!-- Header -->
  <header class="w-full max-w-6xl flex justify-between items-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-900">Roberts Company Dashboard</h1>
    <a href="<?=site_url('users/create');?>"
       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl shadow transition">
       + Create User
    </a>
  </header>

  <!-- Users Grid -->
  <main class="w-full max-w-6xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

    <?php foreach(html_escape($users) as $user): ?>
      <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between hover:shadow-2xl transition">
        <div>
          <h2 class="text-xl font-bold text-gray-800 mb-2"><?= $user['username']; ?></h2>
          <p class="text-gray-600 mb-4"><?= $user['email']; ?></p>
        </div>
        <div class="flex gap-2">
          <a href="<?=site_url('users/update/'.$user['id'])?>"
             class="flex-1 bg-gray-400 hover:bg-gray-500 text-white text-center py-2 rounded-xl shadow-sm transition">
             Edit
          </a>
          <a href="<?=site_url('users/delete/'.$user['id'])?>"
             onclick="return confirm('Are you sure you want to delete this record?');"
             class="flex-1 bg-red-500 hover:bg-red-600 text-white text-center py-2 rounded-xl shadow-sm transition">
             Delete
          </a>
        </div>
      </div>
    <?php endforeach; ?>

  </main>

</body>
</html>
