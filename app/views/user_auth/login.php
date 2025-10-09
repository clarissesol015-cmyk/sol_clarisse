<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #ffd6e8, #ffe6f2, #fff0f5);
      margin: 0;
      padding: 30px;
      color: #5a3b47;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      background: rgba(255, 255, 255, 0.75);
      backdrop-filter: blur(14px);
      border-radius: 18px;
      padding: 35px;
      box-shadow: 0px 10px 30px rgba(255, 182, 193, 0.4);
      border: 1px solid rgba(255, 182, 193, 0.3);
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #e75480;
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: 600;
      color: #b84a62;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"] {
      width: 100%;
      padding: 12px 16px;
      margin-top: 5px;
      border-radius: 10px;
      border: 1px solid #f9c5d1;
      background: rgba(255, 240, 245, 0.9);
      color: #5a3b47;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="email"]:focus {
      background: #ffe6f2;
      box-shadow: 0 0 0 2px #ffb6c1;
      outline: none;
    }

    button {
      margin-top: 20px;
      padding: 12px;
      width: 100%;
      border-radius: 50px;
      border: none;
      background: linear-gradient(135deg, #ffb6c1, #ff9eb5);
      color: white;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 6px 14px rgba(255, 182, 193, 0.4);
      transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(135deg, #ff9eb5, #ff7fa2);
      box-shadow: 0 8px 18px rgba(255, 105, 180, 0.5);
      transform: translateY(-2px);
    }

    .toggle-password {
      cursor: pointer;
      font-size: 0.9em;
      color: #e75480;
      text-decoration: underline;
      margin-top: 5px;
      display: inline-block;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: #ff69b4;
    }

    p {
      margin-top: 20px;
      text-align: center;
      color: #5a3b47;
    }

    a {
      color: #e75480;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    a:hover {
      color: #ff69b4;
    }

    .error {
      color: #ff4d6d;
      background: rgba(255, 240, 245, 0.6);
      border: 1px solid #ffb6c1;
      padding: 8px 12px;
      border-radius: 8px;
      text-align: center;
      margin-bottom: 10px;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
      <label for="username">Username or Email</label>
      <input type="text" id="username" name="username" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      <span class="toggle-password" onclick="togglePassword()">Show Password</span>

      <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="<?= site_url('register') ?>">Register here</a></p>
  </div>

  <script>
    function togglePassword() {
      var pwd = document.getElementById('password');
      pwd.type = (pwd.type === 'password') ? 'text' : 'password';
    }
  </script>
</body>
</html>
