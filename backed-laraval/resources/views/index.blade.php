<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Laravel</title>

    <style>
        ::selection { background-color: #E13300; color: white; }
        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            text-decoration: none;
        }

        a:hover {
            color: #97310e;
        }

        h1 {
            color: #444;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px;
        }

        code {
            font-family: Consolas, Monaco, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0;
            padding: 12px 10px;
        }

        #body {
            margin: 0 15px;
            min-height: 96px;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px;
            margin-top: 20px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>
<body>

<div id="container">
    <h1>Welcome to Laravel!</h1>

    <div id="body">
        <p>The page you are looking at is being generated dynamically by Laravel.</p>

        <p>If you would like to edit this page you'll find it located at:</p>
        <code>resources/views/welcome.blade.php</code>

        <p>The corresponding route for this page is found at:</p>
        <code>routes/web.php</code>

        <p>If you are exploring Laravel for the first time, start by reading the documentation:</p>

        <a href="https://laravel.com/docs" target="_blank">
            Laravel Documentation
        </a>
    </div>

    <p class="footer">
        Laravel Version <strong>{{ app()->version() }}</strong>
    </p>
</div>

</body>
</html>