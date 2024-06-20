<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PemBar HME | Register</title>
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

    .register-box {
        width: 500px;
        border: solid 3px;
        padding: 30px;
        background-color: lightskyblue;
        
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
        @if ($errors->any())
            <div class="alert alert-danger" style="width: 500px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
         @endif
        <div class="register-box">
            <p>REGISTER PAGE</p>
            <form action="" method="post">
                @csrf 
                <div>
                    <label for="username" class="form-label" style="font-weight: bold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" maxlength="50" required>
                </div>
                <div>
                    <label for="password" class="form-label" style="font-weight: bold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <label for="phone" class="form-label" style="font-weight: bold">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" maxlength="13" minlength="10">
                </div>
                <div>
                    <label for="address" class="form-label" style="font-weight: bold" >Address</label>
                    <textarea name="address" id="address" rows="5" class="form-control" maxlength="100" style="resize: none" required></textarea>
                </div>
                <div style="font-weight: bold">
                        <button type="submit" class="btn btn-dark form-control">REGISTER</button>
                </div>
                <div class="text-center" style="font-weight: bold">
                    Have Account? <a href="login">Login</a>
                </div>
            </form>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>