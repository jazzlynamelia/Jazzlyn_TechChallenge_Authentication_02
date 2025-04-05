<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to Dashboard, {{ auth()->user()->name }}!</h1>

     <!-- Form logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf <!-- Token untuk keamanan agar form gabisa diakses oleh pihak luar -->

        <!-- Tombol logout -->
        <button type="submit">Logout</button>
    </form>
</body>
</html>
