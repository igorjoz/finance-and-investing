let startDate: Date;

if ("startDate" in localStorage) {
    startDate = new Date(localStorage.getItem("startDate")!);
} else {
    startDate = new Date();
}

function calculateSpentTime(): number {
    const currentTime = new Date().getTime();
    const spentTime = currentTime - startDate.getTime();

    return spentTime;
};

function convertMillisecondsToTime(milliseconds: number): string {
    const hours = Math.floor(milliseconds / 6_000_000);
    const minutes = Math.floor(milliseconds % 6_000_000 / 60_000);
    const seconds = Number(((milliseconds % 60_000) / 1_000).toFixed(0));

    let spentTimeValue = "";

    if (hours > 0 && hours < 10) {
        spentTimeValue += "0" + hours + ":";
    } else if (hours >= 10) {
        spentTimeValue += hours + ":";
    }

    if (minutes < 10) {
        spentTimeValue += "0";
    }
    spentTimeValue += minutes + ":" + (seconds < 10 ? '0' : '') + seconds;

    return spentTimeValue;
}

function setSpentTimeValue(): void {
    const timeSpentElement = document.getElementById('footer__total-spent-time-value')! as HTMLSpanElement;

    const spentTime = calculateSpentTime();

    localStorage.setItem("startDate", startDate.toString());

    const spentTimeValue = convertMillisecondsToTime(spentTime);

    timeSpentElement.innerText = spentTimeValue;
}

function startRefreshingSpentTime(): void {
    window.setInterval(setSpentTimeValue, 1000);
}

function showTotalSpentTime(): void {
    const timeSpentList = document.getElementById('footer__time-spent-list')! as HTMLUListElement;
    const timeSpentOnCurrentPageListItem = document.getElementById('footer__time-spent-on-current-page-list-element')! as HTMLLIElement;
    const showTotalTimeButton = document.getElementById('footer__show-total-time-button')! as HTMLButtonElement;

    const totalTimeSpentListItem = document.createElement('li');
    totalTimeSpentListItem.id = 'footer__total-spent-time-list-item';
    totalTimeSpentListItem.innerText = 'Total time spent on the website: ';

    const totalTimeSpentSpan = document.createElement('span');
    totalTimeSpentSpan.id = 'footer__total-spent-time-value';
    totalTimeSpentSpan.classList.add('footer__time-spent-span');
    totalTimeSpentSpan.innerText = convertMillisecondsToTime(calculateSpentTime());

    totalTimeSpentListItem.appendChild(totalTimeSpentSpan);

    showTotalTimeButton.style.display = "none";

    timeSpentList.appendChild(totalTimeSpentListItem);

    startRefreshingSpentTime();
}

// function setSpentTimeOnCurrentPageValue(): void {
//     const timeSpentOnCurrentPageElement = document.getElementById('footer__spent-time-on-current-page-value')! as HTMLSpanElement;

//     const spentTime = calculateSpentTime();

//     // localStorage.setItem("currentPageStartDate", startDate.toString());
//     let currentPageStartDate: Date;
//     if ("currentPageStartDate" in sessionStorage) {
//         currentPageStartDate = new Date(sessionStorage.getItem("currentPageStartDate")!);
//     } else {
//         currentPageStartDate = new Date();
//     }

//     const spentTimeValue = convertMillisecondsToTime(spentTime);

//     timeSpentOnCurrentPageElement.innerText = spentTimeValue;
// }

// window.addEventListener('load', startCountingSpentTime);
