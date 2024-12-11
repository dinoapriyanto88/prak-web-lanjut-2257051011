<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        form {
            width: 20%;
            padding: 20px;
            width: 15%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #3f3f3f;
            color: #1c9127;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a4a4a;
        }
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 60%
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            background-color: #1e1e1e;
            color: #ffffff;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #555;
        }
        thead {
            background-color: #333333;
            color: #ffffff;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>