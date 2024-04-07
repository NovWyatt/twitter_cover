<!DOCTYPE html>
<html>

<head>
    <title>Register Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: white;
        font-family: sans-serif;
    }

    .img-logo svg {
        max-height: 380px;
        height: 50%;
        fill: currentcolor;
        position: absolute;
        top: 50%;
        left: 27%;
        transform: translate(-50%, -50%);
        color: rgb(0, 0, 0);
    }

    .login-box {
        width: 280px;
        position: absolute;
        top: 50%;
        right: 5%;
        transform: translate(-50%, -50%);
        color: #fff;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
    }

    .login-box h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .user-box {
        position: relative;
        margin-bottom: 20px;
    }

    .user-box input {
        width: 100%;
        padding: 10px 10px;
        font-size: 16px;
        color: #fff;
        margin-bottom: 30px;
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }

    .user-box label {
        position: absolute;
        top: 0;
        left: 0;
        padding: 10px 0;
        font-size: 16px;
        color: #fff;
        pointer-events: none;
        transition: 0.5s;
    }

    .user-box input:focus~label,
    .user-box input:valid~label {
        top: -35px;
        left: 0;
        color: #03a9f4;
        font-size: 12px;
    }

    button[type="submit"] {
        display: block;
        margin: 0 auto;
        background-color: #03a9f4;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.5s;
    }

    button[type="submit"]:hover {
        background-color: black;
    }
</style>

<body>
    <div class="row justify-content-center">
        <div class="col-6 img-logo">
            <svg viewBox="0 0 24 24" aria-hidden="true"
                class="r-4qtqp9 r-yyyyoo r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1nao33i r-rxcuwo r-1777fci r-m327ed r-494qqr">
                <g>
                    <path
                        d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z">
                    </path>
                </g>
            </svg>
        </div>
        <div class="col-6">
            <div class="login-box">
                <h2>Sign Up</h2>
                <form method="POST" action="/register">
                    @csrf
                    <div class="user-box">
                        <input type="text" name="name" value="{{ old('name') }}">
                        <label>Fullname</label>
                        @error('name')
                            <p style="font-size: small; color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="user-box">
                        <input type="text" name="email" value="{{ old('email') }}">
                        <label>Email</label>
                        @error('email')
                            <p style="font-size: small; color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="user-box">
                        <input type="text" name="username" value="{{ old('username') }}">
                        <label>Username</label>
                        @error('username')
                            <p style="font-size: small; color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="user-box">
                        <input type="password" name="password">
                        <label>Password</label>
                        @error('password')
                            <p style="font-size: small; color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit">Signup</button>
                    <br><br>
                    <a style="display: flex; justify-content:center; text-decoration: none; color:#03a9f4;"
                        href="/login">Click here to login</a>
                </form>
            </div>
        </div>
    </div>
</body>

<body>
</body>

</html>
