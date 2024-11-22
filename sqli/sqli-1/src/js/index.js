    document.addEventListener('DOMContentLoaded', () => {
        const filters = document.getElementById('filters');

        filters.addEventListener('click', (event) => {
            // Check if a <p> tag was clicked
            if (event.target.tagName === 'P') {
                const type = event.target.getAttribute('data-type'); // Get the filter type
                const url = new URL(window.location.href); // Get the current URL

                // Update the 'type' query parameter
                url.searchParams.set('type', type);

                // Redirect to the new URL
                window.location.href = url;
            }
        });
    });

