<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="6;url={{ route('dashboard') }}">
    <title>Login Diperlukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .icon {
            font-size: 80px;
            color: #28a745;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                color: #28a745;
            }

            50% {
                transform: scale(1.1);
                color: #20c997;
            }
        }

        body {
            background-color: #2d3436;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .container {
            text-align: center;
            max-width: 500px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .message h1 {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .message p {
            margin: 5px 0;
            font-size: 1.1em;
        }

        #countdown {
            font-weight: bold;
            color: #ff7675;
        }

        .gif {
            width: 200px;
            margin-top: 20px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="message">
            <i class="fas fa-user-lock icon"></i>
            <h1>Login Diperlukan</h1>
            <p>Untuk mengakses halaman ini, Anda harus login terlebih dahulu.</p>
            <p>Anda akan diarahkan ke halaman dashboards dalam <span id="countdown">6</span> detik.</p>
            <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxX6pG/giphy.gif" alt="Loading..." class="gif">
        </div>
    </div>

    <script>
        let countdown = 6;
        const countdownElement = document.getElementById('countdown');
        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(interval);
            }
        }, 1000);
    </script>
</body>

</html>
