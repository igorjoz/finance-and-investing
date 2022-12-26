<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Project P.F.I - Personal Finances & Investing</title>
    <meta name="description" content="Personal website about my hobby - Personal Finances & Investing">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="./resources/js/magnific-popup/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="./resources/js/magnific-popup/magnific-popup.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,400&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./resources/css/index.css">

    <script src="./resources/js/app.js"></script>
    <script src="./resources/js/timer.js"></script>
    <script src="./resources/js/slider.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="./resources/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./resources/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./resources/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="./resources/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="./resources/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="./resources/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="./resources/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="page__preload">
    <? include "./components/navigation.php"; ?>

    <!-- MAIN -->
    <main class="page__main">
        <article class="page__article">
            <header class="page__article-header">
                <h1 class="page__article-header-text">
                    Homepage
                </h1>
            </header>

            <section class="page__section page__section--center">
                <div class="slider__wrapper">
                    <img src="../../web/images/slider/previous.png" class="slider__previous-icon"
                        alt="Previous slide icon">

                    <div class="slider__images-container">
                        <!-- <img src="./resources/images/slider/1.webp" class="slider__image slider__image--active"
                            alt="Investing slide"> -->

                        <img src="../../web/images/slider/1.webp" class="slider__image slider__image--active"
                            alt="Investing slide">

                        <!-- ../../web/images/slider/previous.png -->

                        <img src="./resources/images/slider/2.png" class="slider__image"
                            alt="FAQ (Frequently Asked Questions) slide">

                        <img src="./resources/images/slider/3.jpg" class="slider__image"
                            alt="ETF (Exchange-traded funds) slide">

                        <img src="./resources/images/slider/4.avif" class="slider__image" alt="Inflation slide">

                        <img src="./resources/images/slider/5.jpg" class="slider__image" alt="Gold slide">
                    </div>

                    <img src="./resources/images/slider/next.png" class="slider__next-icon" alt="Next slide icon">
                </div>

                <noscript>
                    <img src="./resources/images/slider/1.webp" class="slider__image slider__image--active"
                        alt="Investing slide">

                    <img src="./resources/images/slider/2.png" class="slider__image"
                        alt="FAQ (Frequently Asked Questions) slide">

                    <img src="./resources/images/slider/3.jpg" class="slider__image slider__image--active"
                        alt="ETF (Exchange-traded funds) slide">

                    <img src="./resources/images/slider/4.avif" class="slider__image slider__image--active"
                        alt="Inflation slide">

                    <img src="./resources/images/slider/5.jpg" class="slider__image slider__image--active"
                        alt="Gold slide">
                </noscript>
            </section>

            <section class="page__section page__section--center">
                <h2 class="page__section-header">
                    Recommended websites in Polish
                </h2>

                <ul class=" home__recommendations-list">
                    <li class="home__recommendation-list-item">
                        <a href="https://jakoszczedzacpieniadze.pl/" class="link" target="_blank">
                            Jak oszczędzać pieniądze - Michał Szafrański
                        </a>
                    </li>

                    <li class="home__recommendation-list-item">
                        <a href="https://marciniwuc.com/" class="link" target="_blank">
                            Finanse Bardzo Osobiste - Marcin Iwuć
                        </a>
                    </li>
                </ul>
            </section>

            <section class="page__section page__section--center">
                <h2 class="page__section-header">
                    Recommended literature in Polish
                </h2>

                <ul class="home__recommendations-list">
                    <li class="home__recommendation-list-item">
                        <a href="https://finansowyninja.pl/" class="link" target="_blank">
                            Finansowy Ninja - Michał Szafrański
                        </a>
                    </li>

                    <li class="home__recommendation-list-item">
                        <a href="https://finansowaforteca.pl/" class="link" target="_blank">
                            Finansowa Forteca - Marcin Iwuć
                        </a>
                    </li>
                </ul>
            </section>
        </article>
    </main>
    <!-- END MAIN -->

    <? include "./components/navigation.php"; ?>
</body>

</html>