<?php

require_once '../app/Services/PathService.php';

?>

<nav class="navigation">
    <header class="navigation__header-element">
        <h1 class="navigation__main-header">
            <img src="../images/stocks-icon.svg" alt="Investing icon" class="navigation__logo">

            <a href="/" class="link link--no-hover-underline link--default-font-color navigation__main-header-link"
                id="navigation__main-header-link">
                Project P.F.I
            </a>
        </h1>
    </header>

    <div class="navigation__list-wrapper">
        <ul class="navigation__list">
            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/') ?>">
                <a href="/" class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                    Home
                </a>
            </li>

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/home/investing') ?>">
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

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/home/faq') ?>">
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

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/home/contact') ?>">
                <a href="/home/contact"
                    class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                    Contact
                </a>
            </li>

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/gallery') ?>">
                <a href="/gallery"
                    class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                    Gallery
                </a>
            </li>

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/favorite-images') ?>">
                <a href="/favorite-images"
                    class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                    Favorites
                </a>
            </li>

            <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/image/create') ?>">
                <a href="/image/create"
                    class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                    Upload
                </a>
            </li>

            <?php if (User::isLoggedIn()): ?>
                <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/user/logout') ?>">
                    <a href="/user/logout"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Logout
                    </a>
                </li>

                <?php else: ?>

                <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/user/login') ?>">
                    <a href="/user/login"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Login
                    </a>
                </li>

                <li class="navigation__list-item <?= PathService::activeElementIfIsCurrentUri('/user/create') ?>">
                    <a href="/user/create"
                        class="link link--default-font-color link--no-hover-underline navigation__list-item-link">
                        Register
                    </a>
                </li>

                <?php endif; ?>

        </ul>
    </div>
</nav>