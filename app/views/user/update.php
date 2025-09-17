<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User/Update</title>
    <style>
        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff;
            color: #444;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0px 10px 25px rgba(255, 105, 180, 0.4);
            width: 360px;
            animation: fadeIn 0.6s ease-in-out;
            border: 3px solid #ffd6e8;
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            color: #b83280;
            text-shadow: 1px 1px 3px rgba(255, 0, 102, 0.2);
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            color: #e75480;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #fbc2eb;
            border-radius: 12px;
            outline: none;
            transition: 0.3s;
            font-size: 15px;
            background: #fff0f5;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #ff80bf;
            box-shadow: 0px 0px 10px rgba(255, 105, 180, 0.5);
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff80bf, #a18cd1);
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            box-shadow: 0 6px 12px rgba(255,105,180,0.4);
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #e75480, #b83280);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(255,0,102,0.5);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update User</h1>
        <form method="post" action="<?= site_url('user/update/'.$user['id']) ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= html_escape($user['username']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= html_escape($user['email']) ?>" required>

            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
