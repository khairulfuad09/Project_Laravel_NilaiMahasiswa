<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Halaman | Masuk</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <form action="/login" method="post" class="form-signin">
        @csrf
        <img class="mb-4" src="/img/user.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Tolong Masuk</h1>
        <label for="inputEmail" class="sr-only">username</label>
        <input type="text" id="inputEmail"
            class="form-control @error('username')
            is-invalid
        @enderror" placeholder="Username"
            name="username" required autofocus>
        {{-- @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror --}}
        <label for="inputPassword" class="sr-only">Kata Sandi</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
    </form>



</body>

</html>
