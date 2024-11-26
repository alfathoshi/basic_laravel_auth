<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="navbar">
        <h1>Dashboard</h1>
        <div class="menu">
            <form action="/logout" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2>Welcome to the Dashboard!</h2>
        <h3>{{$user->email}}</h3>
        <p>{{$user->name}}</p>
    </div>
</body>

</html>