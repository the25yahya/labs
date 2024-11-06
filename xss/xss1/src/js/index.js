const inputField = document.querySelector('#search-field');
const btn = document.querySelector('#search-btn');
const url = new URL(window.location);

btn.addEventListener('click', function() {
    // Update the 'query' parameter in the URL
    url.searchParams.set('query', inputField.value);
    
    // Update the browser's URL without reloading the page
    window.history.pushState({}, '', url);
    window.location.href = url.href
});
