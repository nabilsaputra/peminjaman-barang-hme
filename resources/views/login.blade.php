<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PemBar HME | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
        background-image: url(images/elektro50.png);
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
        
    }

    .login-box {
        width: 500px;
        border: solid 3px;
        padding: 30px;
        background-color: lightskyblue
        
    }

    form div {
        margin-bottom: 15px;
    }

    p {
        text-align: center;
        font-size: 20px;
        text-shadow: 2px 2px 5px whitesmoke;
        font-weight: bold;
    }
</style>

<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
         @endif
        <div class="login-box">
            <p>LOGIN PAGE</p>
            <form action="" method="post">
                @csrf 
                <div>
                    <label for="username" class="form-label" style="font-weight: bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label" style="font-weight: bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                        <button type="submit" class="btn btn-dark form-control" style="font-weight: bold">LOGIN</button>
                </div>
                <div class="text-center" style="font-weight: bold">
                    Dont have Account? <a href="register">Register</a> Now
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>