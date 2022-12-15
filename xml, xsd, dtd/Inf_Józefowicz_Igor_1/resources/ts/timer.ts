let userOnWebsiteStartDate: Date;
let userOnCurrentPageStartDate: Date;

if ("lastPage" in sessionStorage && sessionStorage.getItem("lastPage") !== window.location.pathname) {
    sessionStorage.setItem("userOnCurrentPageStartDate", new Date().toString());
}
sessionStorage.setItem("lastPage", window.location.pathname);

if ("userOnWebsiteStartDate" in localStorage) {
    userOnWebsiteStartDate = new Date(localStorage.getItem("userOnWebsiteStartDate")!);
} else {
    userOnWebsiteStartDate = new Date();
    localStorage.setItem("userOnWebsiteStartDate", userOnWebsiteStartDate.toString());
}

if ("userOnCurrentPageStartDate" in sessionStorage) {
    userOnCurrentPageStartDate = new Date(sessionStorage.getItem("userOnCurrentPageStartDate")!);
} else {
    userOnCurrentPageStartDate = new Date();
    sessionStorage.setItem("userOnCurrentPageStartDate", userOnCurrentPageStartDate.toString());
}

function calculateSpentTime(startDate: Date): number {
    const currentTime = new Date().getTime();
    const spentTime = currentTime - startDate.getTime();

    return spentTime;
};

function convertMillisecondsToTime(milliseconds: number): string {
    let secondsLeft = Math.floor(milliseconds / 1000);

    const hours = Math.floor(secondsLeft / 3600);
    secondsLeft %= 3600;
    const minutes = Math.floor(secondsLeft / 60);
    secondsLeft %= 60;
    const seconds = secondsLeft;

    let spentTimeString = "";

    if (hours > 0 && hours < 10) {
        spentTimeString += "0" + hours + ":";
    } else if (hours >= 10) {
        spentTimeString += hours + ":";
    }

    spentTimeString += (minutes < 10 ? "0" : "") + minutes + ":";
    spentTimeString += (seconds < 10 ? "0" : "") + seconds;

    return spentTimeString;
}

function setSpentTimeValue(): void {
    const timeSpentElement = document.getElementById('footer__total-spent-time-value')! as HTMLSpanElement;

    const spentTime = calculateSpentTime(userOnWebsiteStartDate);

    const spentTimeValue = convertMillisecondsToTime(spentTime);

    timeSpentElement.innerText = spentTimeValue;
}

function showTotalSpentTime(): void {
    const timeSpentList = document.getElementById('footer__time-spent-list')! as HTMLUListElement;
    const timeSpentOnCurrentPageListItem = document.getElementById('footer__time-spent-on-current-page-list-element')! as HTMLLIElement;
    const showTotalTimeButton = document.getElementById('footer__show-total-time-button')! as HTMLButtonElement;

    const totalTimeSpentListItem = document.createElement('li');
    totalTimeSpentListItem.id = 'footer__total-spent-time-list-item';
    totalTimeSpentListItem.innerText = 'Total time spent on the website: ';
    totalTimeSpentListItem.classList.add('footer__list-item', 'footer__list-item--total-spent-time');
    totalTimeSpentListItem.classList.remove('footer__list-item--button-inside');

    const totalTimeSpentSpan = document.createElement('span');
    totalTimeSpentSpan.id = 'footer__total-spent-time-value';
    totalTimeSpentSpan.classList.add('footer__time-spent-span');
    totalTimeSpentSpan.innerText = convertMillisecondsToTime(calculateSpentTime(userOnWebsiteStartDate));

    totalTimeSpentListItem.appendChild(totalTimeSpentSpan);

    showTotalTimeButton.style.display = "none";

    timeSpentList.appendChild(totalTimeSpentListItem);

    window.setInterval(setSpentTimeValue, 1000);
}

function setSpentTimeOnCurrentPageValue(): void {
    const timeSpentOnCurrentPageElement = document.getElementById('footer__spent-time-on-current-page-value')! as HTMLSpanElement;

    const spentTime = calculateSpentTime(userOnCurrentPageStartDate);
    const spentTimeValue = convertMillisecondsToTime(spentTime);

    timeSpentOnCurrentPageElement.innerText = spentTimeValue;
}

window.addEventListener('load', () => {
    window.setInterval(setSpentTimeOnCurrentPageValue, 1000);
});

