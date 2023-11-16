document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const isChecked = this.checked ? 1 : 0;
            const itemId = this.getAttribute('data-item-id');

            const formData = new FormData();
            formData.append('itemId', itemId);
            formData.append('isChecked', isChecked);

            // Modify the URL to fetch update-moderation.php from the public directory
            const updateModerationUrl = '/update-moderation.php';

            // Send an AJAX request to update the database
            fetch(updateModerationUrl, {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    alert('Moderation status updated successfully.');
                } else {
                    alert('Failed to update moderation status.');
                }
            });
        });
    });
});