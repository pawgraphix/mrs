<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome | MaReS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: #0e2f44;
            overflow: hidden;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .background {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, #4a90e2, #0e2f44);
            z-index: 0;
            overflow: hidden;
        }

        .gear-icon {
            position: absolute;
            font-size: 120px;
            color: rgba(255, 255, 255, 0.07);
            animation: rotate 30s linear infinite, float 10s ease-in-out infinite alternate;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            25% { transform: translate(10px, -15px); }
            50% { transform: translate(-20px, 10px); }
            75% { transform: translate(5px, -5px); }
            100% { transform: translate(-15px, 20px); }
        }

        /* Random placement and delay for many gears */
        .gear1 { top: 10%; left: 10%; animation-delay: 0s, 0s; }
        .gear2 { top: 30%; left: 25%; animation-delay: 0s, 2s; }
        .gear3 { top: 60%; left: 15%; animation-delay: 0s, 4s; }
        .gear4 { top: 80%; left: 35%; animation-delay: 0s, 3s; }
        .gear5 { top: 20%; right: 10%; animation-delay: 0s, 5s; }
        .gear6 { top: 40%; right: 25%; animation-delay: 0s, 1s; }
        .gear7 { bottom: 10%; right: 20%; animation-delay: 0s, 2.5s; }
        .gear8 { bottom: 30%; right: 5%; animation-delay: 0s, 3.2s; }
        .gear9 { bottom: 50%; left: 5%; animation-delay: 0s, 4.5s; }
        .gear10 { top: 45%; left: 50%; animation-delay: 0s, 1.8s; }

        .container {
            position: relative;
            z-index: 1;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.08);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
        }

        .container h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #fff;
            color: #0e2f44;
            padding: 12px 24px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
        }

        .btn:hover {
            background-color: #e0e0e0;
            transform: scale(1.05);
        }

        @media (max-width: 600px) {
            .container h1 {
                font-size: 28px;
            }

            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

<div class="background">
    <i class="fas fa-cog gear-icon gear1"></i>
    <i class="fas fa-cog gear-icon gear2"></i>
    <i class="fas fa-cog gear-icon gear3"></i>
    <i class="fas fa-cog gear-icon gear4"></i>
    <i class="fas fa-cog gear-icon gear5"></i>
    <i class="fas fa-cog gear-icon gear6"></i>
    <i class="fas fa-cog gear-icon gear7"></i>
    <i class="fas fa-cog gear-icon gear8"></i>
    <i class="fas fa-cog gear-icon gear9"></i>
    <i class="fas fa-cog gear-icon gear10"></i>
</div>

<div class="container">
    <h1>Welcome to MaReS</h1>
    <p>Maintenance Reporting System for institutions — helping you track and report issues efficiently.</p>
    <a href="{{ route('login') }}" class="btn">Go to Login</a>
</div>

</body>
</html>
