<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User/Create</title>
  <style>
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #ffe6f0, #ffd1dc, #fff0f5); /* soft pink gradient */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #5a4a4a;
    }

    .form-container {
      background: rgba(255, 245, 247, 0.9);
      padding: 35px 45px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(255, 182, 193, 0.5);
      width: 360px;
      animation: fadeIn 0.6s ease-in-out;
      border: 2px solid #ffc2d1;
    }

    .form-container h1 {
      text-align: center;
      margin-bottom: 20px;
      font-size: 22px;
      color: #e75480; /* rose pink */
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    label {
      font-weight: 600;
      display: block;
      margin-top: 15px;
      margin-bottom: 6px;
      color: #7a5c65;
      font-size: 14px;
    }

    input[type="text"],
    input[type="email"] {
      width: 100%;
      padding: 12px;
      border: 2px solid #ffc2d1;
      border-radius: 12px;
      outline: none;
      transition: 0.3s;
      font-size: 15px;
      background: #fff;
      color: #5a4a4a;
    }

    input[type="text"]:focus,
    input[type="email"]:focus {
      border-color: #ff8fab;
      box-shadow: 0px 0px 8px rgba(255, 143, 171, 0.5);
    }

    input[type="submit"] {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #ff9eb5, #ff7fa2);
      color: white;
      font-size: 16px;
      font-weight: bold;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 0 6px 12px rgba(255, 143, 171, 0.5);
      transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
      background: linear-gradient(135deg, #ff8fab, #ff6b9d);
      transform: translateY(-2px);
      box-shadow: 0 8px 16px rgba(255, 111, 145, 0.6);
    }

    a {
      display: inline-block;
      margin-top: 15px;
      color: #ff6b9d;
      font-weight: 600;
      text-decoration: none;
      text-align: center;
      width: 100%;
      transition: 0.3s;
    }

    a:hover {
      color: #e75480;
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
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
    <a href="<?= site_url('user/view'); ?>">&larr; Back to User List</a>
  </div>
</body>
</html>
