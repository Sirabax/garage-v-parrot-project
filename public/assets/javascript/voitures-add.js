document.addEventListener('DOMContentLoaded', function () {
    const voitureForm = document.querySelector('#voiture-form');

    if (voitureForm) {
        voitureForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(voitureForm);

            fetch('/add-voiture.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Handle form errors
                    alert('Failed to add voiture. Please check the form for errors.');
                    console.log(data.errors); // Log errors to the console for debugging
                } else {
                    // Voiture added successfully
                    alert('Voiture added successfully.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the voiture.');
            });
        });
    }
});