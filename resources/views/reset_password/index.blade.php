<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/auth.css">
</head>
<body>
    <div class="reset-password-container">
        <h2>Reset Password</h2>
        <form action="/reset-password" method="POST" class="reset-password-form">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn-submit">Change Password</button>
        </form>
    </div>
</body>
</html>
