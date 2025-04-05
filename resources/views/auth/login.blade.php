<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <!-- Form login -->
    <form method="POST" action="{{ route('login.post') }}">
        @csrf <!-- Token untuk keamanan agar form gabisa diakses oleh pihak luar -->

        <!-- Input email -->
        <input type="email" name="email" placeholder="Email" required><br><br>

        <!-- Input password -->
        <input type="password" name="password" placeholder="Password" required><br><br>

        <!-- Tombol login -->
        <button type="submit">Login</button>
    </form>

    <!-- Link ke register page -->
    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>
