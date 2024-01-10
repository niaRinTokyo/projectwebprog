<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carent.id | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    body {
        background-color: #f8f9fa;
    }

    .main {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-box {
        width: 350px;
        border: 1px solid #ddd;
        padding: 30px;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .login-box h2 {
        text-align: center;
        color: #007bff;
    }

    form div {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .alert {
        background-color: #dc3545;
    }

    a {
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('message') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
        @endif
        <div class="login-box">
            <h2>Login</h2>
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username" class="form-label">
                        Username
                    </label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="text-center">
                    Don't Have Account? <a href="register">Sign Up</a>
                </div>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
