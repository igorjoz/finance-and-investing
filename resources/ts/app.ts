window.addEventListener('load', (event) => {
    document.body.classList.remove('page__preload');
});

// function getWidth(): number {
//     return Math.max(
//         document.body.scrollWidth,
//         document.documentElement.scrollWidth,
//         document.body.offsetWidth,
//         document.documentElement.offsetWidth,
//         document.documentElement.clientWidth,
//     );
// }

// function setNavigationMainHeaderLinkText(): void {
//     const navigationMainHeaderLink = document.getElementById('navigation__main-header-link')! as HTMLAnchorElement;

//     if (getWidth() < 1100) {
//         navigationMainHeaderLink.innerText = "Project P.F.I";
//     } else {
//         navigationMainHeaderLink.innerText = "Project P.F.I - Personal Finance & Investing";
//     }
// }

// window.addEventListener('load', setNavigationMainHeaderLinkText);
// addEventListener('resize', setNavigationMainHeaderLinkText);

