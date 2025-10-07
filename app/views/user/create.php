<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User/Create</title>
  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1e293b, #0f172a); /* dark navy gradient */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #e2e8f0;
    }

    .form-container {
      background: #1f2937; /* dark card */
      padding: 30px 40px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.5);
      width: 360px;
      animation: fadeIn 0.6s ease-in-out;
      border: 1px solid #334155;
    }

    .form-container h1 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 22px;
      color: #38bdf8; /* cyan accent */
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 15px;
      margin-bottom: 6px;
      color: #94a3b8;
    }

    input[type="text"], input[type="email"] {
      width: 100%;
      padding: 12px;
      border: 2px solid #334155;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
      font-size: 15px;
      background: #0f172a;
      color: #e2e8f0;
    }

    input[type="text"]:focus, input[type="email"]:focus {
      border-color: #38bdf8;
      box-shadow: 0px 0px 8px rgba(56,189,248,0.5);
    }

    input[type="submit"] {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #2563eb, #1d4ed8); /* bold blue */
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(37,99,235,0.4);
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background: linear-gradient(135deg, #1e40af, #1d4ed8);
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(37,99,235,0.6);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h1>Create New User</h1>
    <form method="post" action="">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <input type="submit" value="Create User">
    </form>
    <a href="<?= site_url('user/view'); ?>" style="display: inline-block; margin-top: 15px; color: #60a5fa; font-weight: 600; text-decoration: underline;">&larr; Back to User List</a>
  </div>
</body>
</html>
