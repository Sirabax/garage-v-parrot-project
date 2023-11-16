document.addEventListener('DOMContentLoaded', function () {
    const commentForm = document.querySelector('#comment-form');

    if (commentForm) {
        commentForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the default form submission

            const formData = new FormData(commentForm);

            fetch('/add-comment.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Handle form errors
                    alert('Failed to add comment. Please check the form for errors.');
                    console.log(data.errors); // Log errors to the console for debugging
                } else {
                    // Comment added successfully
                    alert('Comment added successfully.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the comment.');
            });
        });
    }
});