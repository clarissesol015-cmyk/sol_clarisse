<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb);
            margin: 0;
            padding: 20px;
            color: #444;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 6px rgba(255, 105, 180, 0.5);
            color: #b83280;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
            color: #555;
        }

        th, td {
            padding: 15px 20px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #fbc2eb, #a18cd1);
            color: white;
            font-size: 18px;
        }

        tr {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        tr:nth-child(even) {
            background: #ffe6f2;
        }

        tr:nth-child(odd) {
            background: #fff0f5;
        }

        tr:hover {
            transform: scale(1.02);
            box-shadow: 0px 5px 15px rgba(255,105,180,0.4);
            background: #ffd6e8;
        }

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        a[href*="update"] {
            background: #ff80bf;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="update"]:hover {
            background: #e75480;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255,105,180,0.5);
        }

        a[href*="delete"] {
            background: #ff4d6d;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
        }

        a[href*="delete"]:hover {
            background: #d6336c;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255,0,102,0.4);
        }

        .create-btn {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            display: inline-block;
        }

        .create-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(255,105,180,0.5);
        }
    </style>
</head>
<body>
    <h1>Welcome to User Page</h1>
    
    <div style="width: 80%; margin: 0 auto 30px auto; text-align: right;">
        <a href="<?= site_url('user/create'); ?>" class="create-btn">
            + Create New User
        </a>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="<?= site_url('user/update/'.$user['id']); ?>">Edit</a> |
                    <a href="<?= site_url('user/delete/'.$user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
