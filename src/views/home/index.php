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
    <!-- MAIN MENU, NAVIGATION -->
    <nav class="navigation">
        <header class="navigation__header-element">
            <h1 class="navigation__main-header">
                <img src="./images/stocks-icon.svg" alt="Investing icon" class="navigation__logo">
                <a href="/" class="link link--no-hover-underline link--default-font-color navigation__main-header-link"
                    id="navigation__main-header-link">
                    Project P.F.I
                </a>
            </h1>
        </header>

        <div class="navigation__list-wrapper">
            <ul class="navigation__list">
                <li class="navigation__list-item navigation__list-item--active">
                    <a href="/"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Home
                    </a>
                </li>

                <li class="navigation__list-item">
                    <a href="/home/investing"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Investing
                    </a>

                    <ul class="navigation__dropdown-list">
                        <li class="navigation__dropdown-list-item">
                            <a href="investing#types-of-assets"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                Types of assets
                            </a>

                            <hr class="navigation__dropdown-hr">
                        </li>

                        <li class="navigation__dropdown-list-item">
                            <a href="investing#types-of-portfolios"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                Types of portfolios
                            </a>

                            <hr class="navigation__dropdown-hr">
                        </li>

                        <li class="navigation__dropdown-list-item">
                            <a href="investing#set-of-basic-rules"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                Set of basic rules
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__list-item">
                    <a href="/home/faq"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        FAQ
                    </a>

                    <ul class="navigation__dropdown-list">
                        <li class="navigation__dropdown-list-item">
                            <a href="/home/faq#whats-the-best-time-to-start-investing"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                What's the best time to start investing?
                            </a>

                            <hr class="navigation__dropdown-hr">
                        </li>

                        <li class="navigation__dropdown-list-item">
                            <a href="/home/faq#what-is-inflation-and-how-does-it-work"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                What is inflation and how does it work?
                            </a>

                            <hr class="navigation__dropdown-hr">
                        </li>

                        <li class="navigation__dropdown-list-item">
                            <a href="/home/faq#what-should-i-invest-$10000-in"
                                class="link link--no-hover-underline navigation__dropdown-list-item-link">
                                What should I invest $10'000 in?
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="navigation__list-item">
                    <a href="/home/contact"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Contact
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END MAIN MENU, NAVIGATION -->

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

    <!-- FOOTER -->
    <footer class="footer">
        <ul class="footer__list">
            <li class="footer__list-item">
                Author: Igor Józefowicz
            </li>

            <li class="footer__list-item">
                Email:
                <a href="mailto:igor@jozefowicz.pl" target="_blank" class="link">
                    igor@jozefowicz.pl
                </a>
            </li>

            <li class="footer__list-item">
                Github:
                <a href="https://github.com/igorjoz" target="_blank" class="link">@igorjoz
                </a>
            </li>

            <li class="footer__list-item">
                LinkedIn:
                <a href="https://www.linkedin.com/in/igor-jozefowicz/" target="_blank" class="link">
                    in/igor-jozefowicz
                </a>
            </li>
        </ul>

        <noscript class="page__section page__section--center">
            Please enable JavaScript to ensure proper operation of the website.
        </noscript>

        <ul id="footer__time-spent-list" class="footer__list">
            <li id="footer__time-spent-on-current-page-list-element"
                class="footer__list-item footer__list-item--total-spent-time">
                Time spent on this page:
                <span id="footer__spent-time-on-current-page-value" class="footer__time-spent-span">00:00</span>
            </li>

            <li class="footer__list-item footer__list-item--total-spent-time footer__list-item--button-inside">
                <button onclick="showTotalSpentTime()" id="footer__show-total-time-button"
                    class="btn footer__show-total-spent-time-button">
                    Show time since first visit to the site
                </button>
            </li>
        </ul>
    </footer>
    <!-- END FOOTER -->
</body>

</html>