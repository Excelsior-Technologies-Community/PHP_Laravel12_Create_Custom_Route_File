<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <!-- Bootstrap + Font -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #141e30, #243b55);
        }

        .card-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 50px;
            border-radius: 20px;
            width: 480px;
            text-align: center;
            color: #fff;
            backdrop-filter: blur(12px);
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }

        .btn-modern {
            border-radius: 30px;
            padding: 12px 25px;
            transition: 0.3s;
        }

        .btn-modern:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(255,255,255,0.5);
        }
    </style>
</head>

<body>

<div class="card-box">
    <h1 class="fw-bold">Admin Dashboard</h1>
    <p class="mt-3">Manage your system using admin routes</p>

    <a href="{{ route('admin.users') }}" class="btn btn-light btn-modern mt-4">
        Go to Users
    </a>
</div>

</body>
</html>