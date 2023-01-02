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

    <?php if (User::isLoggedIn()): ?>
        <ul id="footer__time-spent-list" class="footer__list">
            <li id="footer__time-spent-on-current-page-list-element"
                class="footer__list-item footer__list-item--total-spent-time">
                Logged in as: <?= User::getLogin(); ?>
            </li>

            <li id="footer__time-spent-on-current-page-list-element"
                class="footer__list-item footer__list-item--total-spent-time">
                Account email: <?= User::getEmail(); ?>
            </li>
        </ul>
        <?php endif; ?>
</footer>