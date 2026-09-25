<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Personal Task Manager')</title>
    <style>
        :root {
            --bg: #0e0e10;
            --surface: #17171a;
            --surface-2: #1f1f23;
            --pink: #ff3d81;
            --pink-dark: #d81b60;
            --text: #f2f2f2;
            --text-muted: #9a9aa2;
            --border: #2a2a2e;
            --green: #2ecc71;
            --yellow: #f1c40f;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.5;
        }
        header {
            background: var(--surface);
            border-bottom: 2px solid var(--pink);
            padding: 18px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        header h1 {
            font-size: 20px;
            margin: 0;
            letter-spacing: 0.5px;
        }
        header h1 span { color: var(--pink); }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }
        .btn {
            display: inline-block;
            padding: 9px 18px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.1s ease, opacity 0.15s ease;
        }
        .btn:active { transform: scale(0.97); }
        .btn-pink {
            background: var(--pink);
            color: #fff;
        }
        .btn-pink:hover { background: var(--pink-dark); }
        .btn-outline {
            background: transparent;
            color: var(--pink);
            border: 1px solid var(--pink);
        }
        .btn-outline:hover { background: rgba(255,61,129,0.1); }
        .btn-danger {
            background: transparent;
            color: #ff6b6b;
            border: 1px solid #ff6b6b;
        }
        .btn-danger:hover { background: rgba(255,107,107,0.12); }
        .btn-sm { padding: 6px 12px; font-size: 12px; }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 22px;
        }

        .alert {
            background: rgba(46, 204, 113, 0.12);
            border: 1px solid var(--green);
            color: var(--green);
            padding: 10px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            text-align: left;
            padding: 12px 10px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            vertical-align: top;
        }
        th {
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        tr:hover td { background: var(--surface-2); }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-pending {
            background: rgba(241, 196, 15, 0.15);
            color: var(--yellow);
            border: 1px solid var(--yellow);
        }
        .badge-completed {
            background: rgba(46, 204, 113, 0.15);
            color: var(--green);
            border: 1px solid var(--green);
        }

        .actions { display: flex; gap: 8px; flex-wrap: wrap; }

        form.inline { display: inline; }

        label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            color: var(--text-muted);
        }
        input[type=text], input[type=date], textarea, select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: var(--surface-2);
            color: var(--text);
            font-size: 14px;
            margin-bottom: 16px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--pink);
        }
        .empty {
            text-align: center;
            color: var(--text-muted);
            padding: 40px 0;
        }
        .top-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            flex-wrap: wrap;
            gap: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Task<span>Manager</span></h1>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>