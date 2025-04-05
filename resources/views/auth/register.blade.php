<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <!-- Form register -->
    <form method="POST" action="{{ route('register.post') }}">
        @csrf <!-- Token untuk keamanan agar form gabisa diakses oleh pihak luar -->

        <!-- Input nama -->
        <input type="text" name="name" placeholder="Name" required><br><br>

        <!-- Input email -->
        <input type="email" name="email" placeholder="Email" required><br><br>

        <!-- Input password -->
        <input type="password" name="password" placeholder="Password" required><br><br>

        <!-- Button submit -->
        <button type="submit">Register</button>
    </form>

    <!-- Link ke login page -->
    <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
