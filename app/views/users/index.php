<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Roberts Company | Users Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #1E3A8A, #C0C0C0);
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    }

    .card {
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #fff;
      width: 100%;
      max-width: 1100px;
    }

    h2 {
      color: #ffffff;
      font-weight: 700;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .alert-light {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .btn-create {
      background: linear-gradient(135deg, #B22222, #E63946);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 10px;
      transition: 0.3s;
    }

    .btn-create:hover {
      background: #8B0000;
      transform: scale(1.03);
    }

    .btn-danger {
      background: #B22222;
      border: none;
    }

    .btn-danger:hover {
      background: #8B0000;
    }

    .btn-warning {
      background-color: #1E3A8A;
      border: none;
      color: #fff;
    }

    .btn-warning:hover {
      background-color: #2c52c2;
    }

    .table th {
      background-color: rgba(30, 58, 138, 0.9);
      color: #fff;
      text-transform: uppercase;
      font-size: 13px;
    }

    .table tbody tr:hover {
      background-color: rgba(255, 255, 255, 0.05);
    }

    .search-form {
      position: relative;
      display: flex;
      align-items: center;
    }

    #searchInput {
      background: rgba(255, 255, 255, 0.8);
      border: 1px solid #C0C0C0;
      color: #1E3A8A;
      border-radius: 8px;
    }

    #searchInput::placeholder {
      color: #6c757d;
    }

    #clearSearch {
      position: absolute;
      right: 120px;
      background: none;
      border: none;
      font-size: 20px;
      color: #1E3A8A;
      cursor: pointer;
      top: 50%;
      transform: translateY(-50%);
      display: none;
    }

    .btn-search {
      background-color: #B22222;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: 600;
      margin-left: 8px;
      transition: 0.3s;
    }

    .btn-search:hover {
      background-color: #8B0000;
    }

    .text-muted {
      color: #E0E0E0 !important;
    }
  </style>
</head>

<body>
  <div class="card p-4">
    <h2 class="text-center mb-4">Roberts Company — <?= ($logged_in_user['role'] === 'admin') ? 'Admin Dashboard' : 'User Dashboard'; ?></h2>

    <!-- Welcome -->
    <?php if(!empty($logged_in_user)): ?>
      <div class="alert alert-light text-center fw-semibold">
        Welcome, <span class="fw-bold text-white"><?= html_escape($logged_in_user['username']); ?></span>
      </div>
    <?php else: ?>
      <div class="alert alert-danger text-center">Logged in user not found</div>
    <?php endif; ?>

    <!-- Top bar -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3 gap-3">
      <a href="<?= site_url('auth/logout'); ?>" class="btn btn-danger px-4">Logout</a>

      <!-- Search -->
      <form action="<?= site_url('users'); ?>" method="get" class="search-form">
        <?php $q = isset($_GET['q']) ? $_GET['q'] : ''; ?>
        <input id="searchInput" name="q" type="text" placeholder="Search user..." value="<?= html_escape($q); ?>" class="form-control">
        <button type="button" id="clearSearch">&times;</button>
        <button type="submit" class="btn-search">Search</button>
      </form>
    </div>

    <!-- Table -->
    <div class="table-responsive">
      <?php if(!empty($users)): ?>
        <table class="table table-striped table-hover text-center align-middle">
          <thead>
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Email</th>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <th>Password</th>
                <th>Role</th>
              <?php endif; ?>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
              <td><?= html_escape($user['id']); ?></td>
              <td><?= html_escape($user['username']); ?></td>
              <td><?= html_escape($user['email']); ?></td>
              <?php if ($logged_in_user['role'] === 'admin'): ?>
                <td>*******</td>
                <td><?= html_escape($user['role']); ?></td>
              <?php endif; ?>
              <td>
                <?php if ($logged_in_user['role'] === 'admin'): ?>
                  <a href="<?= site_url('/users/update/'.$user['id']);?>" class="btn btn-sm btn-warning">Update</a>
                  <a href="<?= site_url('/users/delete/'.$user['id']);?>" class="btn btn-sm btn-danger">Delete</a>
                <?php else: ?>
                  <span class="text-muted">View Only</span>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <div class="alert alert-warning text-center text-dark">No users found.</div>
      <?php endif; ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
      <?= $page; ?>
    </div>

    <!-- Create Button -->
    <?php if ($logged_in_user['role'] === 'admin'): ?>
      <div class="d-flex justify-content-center mt-4">
        <a href="<?= site_url('users/create'); ?>" class="btn btn-create px-5 py-2">
          + Create New User
        </a>
      </div>
    <?php endif; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const searchInput = document.getElementById("searchInput");
      const clearBtn = document.getElementById("clearSearch");
      function toggleClearButton() {
        clearBtn.style.display = searchInput.value.trim() ? "inline" : "none";
      }
      toggleClearButton();
      searchInput.addEventListener("input", toggleClearButton);
      clearBtn.addEventListener("click", function () {
        searchInput.value = "";
        toggleClearButton();
        window.location.href = "<?= site_url('users'); ?>";
      });
    });
  </script>
</body>
</html>
