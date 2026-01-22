<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Service Not Available</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #333;
        }

        .container {
            background: #ffffff;
            max-width: 520px;
            width: 100%;
            padding: 40px 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .icon {
            margin-bottom: 20px;
        }

        .icon svg {
            width: 60px;
            height: 60px;
            color: #4f46e5;
        }

        h1 {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 22px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: 0.2s ease;
        }

        .btn-primary {
            background: #4f46e5;
            color: #ffffff;
        }

        .btn-primary:hover {
            background: #4338ca;
        }

        .btn-secondary {
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #f3f4f6;
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 22px;
            }

            p {
                font-size: 15px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v3m0 4h.01M3.75 6.75h16.5
                         A2.25 2.25 0 0122.5 9v6
                         a2.25 2.25 0 01-2.25 2.25H3.75
                         A2.25 2.25 0 011.5 15V9
                         a2.25 2.25 0 012.25-2.25z" />
            </svg>
        </div>

        <h1>Service Not Available</h1>

        <p>
            This service is currently not available.
            Our team is working on it and it will be available soon.
            Thank you for your patience.
        </p>

        <div class="buttons">
            <a href="{{ url('/') }}" class="btn btn-primary">Go to Home</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Go Back</a>
        </div>

    </div>
</body>
</html>
