<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #0f172a, #1e293b, #111827);
      margin: 0;
      padding: 30px;
      color: #f3f4f6;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background: rgba(31, 41, 55, 0.7);
      backdrop-filter: blur(12px);
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0px 12px 30px rgba(0,0,0,0.4);
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #60a5fa;
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: 600;
      color: #93c5fd;
    }

    input[type="text"], input[type="password"], input[type="email"], select {
      width: 100%;
      padding: 12px 16px;
      margin-top: 5px;
      border-radius: 8px;
      border: none;
      outline: none;
      background: rgba(30, 41, 59, 0.7);
      color: #f3f4f6;
      font-size: 14px;
      box-shadow: inset 0 2px 4px rgba(0,0,0,0.6);
      transition: background 0.3s ease;
    }

    input[type="text"]:focus, input[type="password"]:focus, input[type="email"]:focus, select:focus {
      background: rgba(59, 130, 246, 0.2);
      box-shadow: 0 0 0 2px #3b82f6;
    }

    button {
      margin-top: 20px;
      padding: 12px;
      width: 100%;
      border-radius: 50px;
      border: none;
      background: linear-gradient(135deg, #3b82f6, #1d4ed8);
      color: white;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 6px 14px rgba(0,0,0,0.4);
      transition: all 0.3s ease;
    }

    button:hover {
      background: #2563eb;
      box-shadow: 0 8px 18px rgba(0,0,0,0.5);
      transform: translateY(-2px);
    }

    .toggle-password {
      cursor: pointer;
      font-size: 0.9em;
      color: #60a5fa;
      text-decoration: underline;
      margin-top: 5px;
      display: inline-block;
    }

    p {
      margin-top: 20px;
      text-align: center;
      color: #f3f4f6;
    }

    a {
      color: #3b82f6;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #2563eb;
    }
  </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post" action="<?= site_url('register') ?>">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required />
            <span class="toggle-password" onclick="togglePassword()">Show Password</span>

            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="<?= site_url('login') ?>">Login here</a></p>
    </div>

    <script>
        function togglePassword() {
            var pwd = document.getElementById('password');
            if (pwd.type === 'password') {
                pwd.type = 'text';
            } else {
                pwd.type = 'password';
            }
        }
    </script>
</body>
</html>
