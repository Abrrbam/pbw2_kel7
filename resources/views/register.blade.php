<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}">
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap') }}" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Baloo 2', cursive;
            background: url('{{ asset('src/img/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .daftar {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .daftar h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .daftar form {
            display: flex;
            flex-direction: column;
        }
        .daftar form select,
        .daftar form input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .daftar form button {
            padding: 10px;
            background-color: #0D1B46;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .daftar form button:hover {
            background-color: #0a1433;
        }
        .daftar p {
            text-align: center;
        }
        .daftar p a {
            color: #0D1B46;
            text-decoration: none;
        }
        .daftar p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="daftar">
        <h1>Daftar</h1>
        <p>sebagai</p> 
        <form action="{{ url('register') }}" method="post">
            @csrf
            <select id="as_a" name="as_a" required>
                <option value="1">Pencari Kost</option>
                <option value="2">Pemilik Kost</option>
            </select>
            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <button type="submit" class="daftar" name="daftar">Daftar</button>
        </form>
        <p>Sudah punya akun? <b><a href="{{ url('login') }}" class="login-text">Masuk</a></b></p>
    </div>
</body>
</html>
