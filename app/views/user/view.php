<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>View</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #fce7f3, #f9a8d4, #fbcfe8);
      margin: 0;
      padding: 30px;
      color: #5b4256;
    }

    h1 {
      text-align: center;
      margin-bottom: 40px;
      color: #be185d;
      font-size: 2.3rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .search-container {
      display: flex;
      justify-content: center;
      margin-bottom: 25px;
    }

    .search-container form {
      display: flex;
      width: 100%;
      max-width: 380px;
      background: rgba(255, 240, 245, 0.8);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(244, 114, 182, 0.3);
    }

    .search-container input[type="text"] {
      padding: 12px 16px;
      border: none;
      outline: none;
      flex: 1;
      background: transparent;
      color: #4a274f;
      font-weight: 500;
    }

    .search-container .search-btn {
      padding: 12px 20px;
      border: none;
      cursor: pointer;
      background: #f472b6;
      color: white;
      font-weight: 600;
      transition: 0.3s;
    }

    .search-container .search-btn:hover {
      background: #ec4899;
    }

    .btn-container {
      width: 85%;
      margin: 0 auto 30px auto;
      text-align: right;
    }

    .create-btn {
      background: linear-gradient(135deg, #f9a8d4, #f472b6);
      color: white;
      padding: 12px 24px;
      text-decoration: none;
      border-radius: 50px;
      font-weight: bold;
      font-size: 15px;
      box-shadow: 0 6px 14px rgba(244, 114, 182, 0.4);
      transition: all 0.3s ease;
      display: inline-block;
    }

    .create-btn:hover {
      transform: translateY(-2px);
      background: #ec4899;
      box-shadow: 0 8px 18px rgba(236, 72, 153, 0.5);
    }

    table {
      width: 85%;
      margin: 0 auto;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 16px;
      overflow: hidden;
      background: rgba(255, 240, 245, 0.85);
      backdrop-filter: blur(12px);
      box-shadow: 0px 12px 30px rgba(236, 72, 153, 0.3);
    }

    th, td {
      padding: 16px 20px;
      text-align: center;
    }

    th {
      background: #f9a8d4;
      color: white;
      font-size: 15px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    tr:nth-child(even) {
      background: rgba(255, 182, 193, 0.4);
    }

    tr:nth-child(odd) {
      background: rgba(255, 228, 235, 0.6);
    }

    tr:hover {
      background: rgba(249, 168, 212, 0.5);
      transition: background 0.3s ease;
    }

    a {
      text-decoration: none;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }

    a[href*="update"] {
      background: #f472b6;
      color: white;
    }

    a[href*="update"]:hover {
      background: #ec4899;
    }

    a[href*="delete"] {
      background: #f87171;
      color: white;
    }

    a[href*="delete"]:hover {
      background: #ef4444;
    }

    /* Pagination */
    .pagination-container {
      width: 85%;
      margin: 30px auto;
      text-align: center;
    }

    .pagination-container ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: inline-flex;
      gap: 10px;
    }

    .pagination-container li {
      display: inline;
    }

    .pagination-container a,
    .pagination-container strong {
      padding: 10px 16px;
      border-radius: 50px;
      background: rgba(255, 182, 193, 0.7);
      color: #4a274f;
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      transition: all 0.3s;
      box-shadow: 0 3px 8px rgba(244, 114, 182, 0.3);
    }

    .pagination-container a:hover {
      background: #f472b6;
      color: white;
      transform: translateY(-2px);
    }

    .pagination-container strong {
      background: #ec4899;
      color: white;
      box-shadow: 0 4px 12px rgba(236,72,153,0.4);
    }

    .pagination-container a:focus,
    .pagination-container strong:focus {
      outline: none;
      box-shadow: 0 0 0 2px #f9a8d4;
    }
  </style>
</head>
<body>
  <h1>USER MANAGEMENT</h1>

  <!-- Server-side search form -->
  <div class="search-container">
    <form action="<?= site_url('/user/view'); ?>" method="get">
      <?php
      $q = '';
      if(isset($_GET['q'])) {
          $q = $_GET['q'];
      }
      ?>
      <input type="text" name="q" placeholder="Search records..." value="<?= html_escape($q); ?>" id="searchBox">
      <button type="submit" class="search-btn">Search</button>
    </form>
  </div>

  <?php $current_role = $current_role ?? 'user'; ?>
  <div class="btn-container">
    <?php if ($current_role === 'admin'): ?>
    <a href="<?= site_url('user/create'); ?>" class="create-btn">
      + Create New User
    </a>
    <?php endif; ?>
    <?php if ($current_role !== 'guest'): ?>
    <a href="<?= site_url('logout'); ?>" class="create-btn" style="background: linear-gradient(135deg, #f87171, #ef4444); margin-left: 10px;">
      Logout
    </a>
    <?php endif; ?>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <?php if ($current_role === 'admin'): ?>
      <th>Action</th>
      <?php endif; ?>
    </tr>

    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['id']; ?></td>
        <td><?= $user['username']; ?></td>
        <td><?= $user['email']; ?></td>
        <?php if ($current_role === 'admin'): ?>
        <td>
          <a href="<?= site_url('user/update/'.$user['id']); ?>">Edit</a>
          <a href="<?= site_url('user/delete/'.$user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
        </td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </table>

  <div class="pagination-container">
    <?php if (isset($page)) echo $page; ?>
  </div>
</body>
</html>
