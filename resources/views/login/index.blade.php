<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1302223099</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/auth.css">
</head>

<body>
    <div class="register-container">
        <h2>Login</h2>
        <form action="/login" method="POST" class="register-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" autofocus required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="/showForgotPassword">Lupa password?</a>
            <div>
                <input type="checkbox" name="rememberme" id="rememberme">
                <label for="rememberme">Remember Me</label>
            </div><br>
            <button type="submit" class="btn-submit">Masuk</button>
        </form>
        @if ($errors->any())
            <div class="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        <p class="login-link">Belum punya akun? <a href="/showRegister">Daftar di sini</a></p>
    </div>
</body>

</html>