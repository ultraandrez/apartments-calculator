<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Calculator</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @stack('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<header class="header main-container">
    <div class="logo">
        <img src="https://erzrf.ru/erz-rest/api/v1/document?id=16052997001&type=LOGO&nocache=1625969349719" width="130px" height="50px" alt="logo">
    </div>
    <nav class="nav">
        <ul class="nav__list list">
            <li class="list__item">
                <a class="list__link" href="/public/apartments/">Квартиры </a>
            </li>
            <li class="list__item">
                <a class="list__link" href="/public/apartments/create/">Добавить квартиру</a>
            </li>
            <li class="list__item">
                <a class="list__link" href="/public/mortgages/">Программы ипотек</a>
            </li>
            <li class="list__item">
                <a class="list__link" href="/public/mortgages/create/">Добавить программы ипотек</a>
            </li>
        </ul>
    </nav>
</header>
<div class="main-container">
    <h1>@yield('title')</h1>
    @yield('content')
</div>

{{--Bootstrap core JavaScript--}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
