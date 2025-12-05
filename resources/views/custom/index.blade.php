<!DOCTYPE html>
<html>
<head>
    <title>Custom Route - Home</title> <!-- Page title -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Body styling: full height, centered content, Poppins font */
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex; /* Flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        /* Glassmorphism card styling */
        .glass-card {
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent background */
            padding: 40px;
            border-radius: 20px;
            width: 460px; /* Fixed width */
            color: #fff; /* Text color */
            box-shadow: 0 8px 32px rgba(0,0,0,0.2); /* Shadow for depth */
            backdrop-filter: blur(10px); /* Blur effect for glassmorphism */
            animation: fadeIn 1s ease-in-out; /* Fade-in animation */
        }

        /* Modern button styling */
        .btn-modern {
            padding: 12px 25px;
            border-radius: 30px; /* Rounded pill shape */
            transition: 0.3s; /* Smooth transition on hover */
        }

        /* Hover effect: scale button slightly */
        .btn-modern:hover {
            transform: scale(1.1);
        }

        /* Keyframes for fadeIn animation */
        @keyframes fadeIn {
            from {opacity:0; transform: translateY(20px);} /* Start slightly lower and invisible */
            to   {opacity:1; transform: translateY(0);} /* End fully visible and in place */
        }
    </style>
</head>

<body>
    <!-- Glass-style card centered in viewport -->
    <div class="glass-card text-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
        <h1 class="fw-bold">Custom Route Demo</h1> <!-- Main heading -->
        <p class="mt-3">Advanced Laravel 12 UI with Glassmorphism</p> <!-- Subtitle -->

        <!-- Navigation buttons -->
        <a href="/custom/about" class="btn btn-light btn-modern mt-3">About</a> <!-- Light button to About page -->
        <a href="/custom/contact" class="btn btn-dark btn-modern mt-3">Contact</a> <!-- Dark button to Contact page -->
    </div>
</body>
</html>
