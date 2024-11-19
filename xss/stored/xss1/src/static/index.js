document.addEventListener('DOMContentLoaded', () => {
    const commentsContainer = document.getElementById('comments-container');

    // Fetch comments from the API
    fetch('/api/comments')
        .then((response) => response.json())
        .then((data) => {
            // Loop through the comments and display them
            data.forEach((comment) => {
                const commentElement = document.createElement('div');
                commentElement.className = 'comment'
                commentElement.innerHTML = `<strong>${comment.user}</strong> <p>${comment.comment}</p>`;
                commentsContainer.appendChild(commentElement);
            });
        })
        .catch((error) => {
            console.error("Error fetching comments:", error);
        });
});

