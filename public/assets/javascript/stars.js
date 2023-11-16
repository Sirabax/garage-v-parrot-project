document.addEventListener("DOMContentLoaded", function () {
    const starsElements = document.querySelectorAll('.stars');

    starsElements.forEach(starsElement => {
        const rating = parseInt(starsElement.getAttribute('data-rating'));
        displayStars(rating, starsElement);
    });

    function displayStars(rating, starsElement) {
        starsElement.innerHTML = '&#11088;'.repeat(rating) + '☆'.repeat(5 - rating);
    }
});