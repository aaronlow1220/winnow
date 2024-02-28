

    document.addEventListener('DOMContentLoaded', function () {
        const container = document.querySelector('.scrollbar-contents');
const leftButton = document.getElementById('left-side');
const rightButton = document.getElementById('right-side');
const step = 270 + 20; // Image width + gap

    leftButton.addEventListener('click', () => {
        const newScrollLeft = Math.max(container.scrollLeft - step, 0);
        container.scrollLeft = newScrollLeft;
    });

    rightButton.addEventListener('click', () => {
        const newScrollLeft = Math.min(container.scrollLeft + step, container.scrollWidth - container.clientWidth);
        container.scrollLeft = newScrollLeft;   
    });
    });