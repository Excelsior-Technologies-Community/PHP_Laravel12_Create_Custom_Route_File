<!DOCTYPE html>
<html>
<head>
    <title>About</title> <!-- Page title -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Body styling: full viewport height, centered content, Poppins font */
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh; /* Full viewport height */
            display: flex; /* Flexbox layout */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        /* Glass-style card styling */
        .glass-card {
            width: 450px; /* Fixed width */
            background: rgba(255,255,255,0.2); /* Semi-transparent background */
            padding: 40px; /* Inner spacing */
            border-radius: 20px; /* Rounded corners */
            text-align: center; /* Center-align text */
            backdrop-filter: blur(12px); /* Blur effect for glassmorphism */
            color: white; /* White text */
        }

        /* Button hover effect: scale up slightly */
        .btn-modern:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- Glassmorphic card with gradient background -->
    <div class="glass-card" style="background: linear-gradient(135deg, #ff9966, #ff5e62);">
        <h1>About Page</h1> <!-- Page heading -->
        <p>This page is loaded using a custom route file.</p> <!-- Description -->

        <!-- Navigation button back to home -->
        <a href="/custom" class="btn btn-dark btn-modern mt-3">Back to Home</a>
    </div>

</body>
</html>
