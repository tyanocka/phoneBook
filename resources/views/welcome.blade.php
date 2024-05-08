<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Телефонная книга</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class=" d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0">Телефонная книга</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('phonebook.index') }}" class="nav-link fw-bold py-1 px-0 text-white ms-3">
                                Домашняя страница
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="nav-link fw-bold py-1 px-0 text-white ms-3">
                                Вход
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link fw-bold py-1 px-0 text-white ms-3">
                                    Регистрация
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <main class="px-3">
            <p class="lead">Авторизуйтесь в системе, чтобы посмотреть доступные номера.</p>
        </main>
    </div>
</body>

</html>
