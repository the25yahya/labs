# lab1 
- setting an image link from user input with img.src is a safe practice ? 
- what's the difference between : let imageUrl = input.value;
        const img = document.createElement('img');
        img.src = imageUrl;
        imageContainer.appendChild(img);
- and :  let imageUrl = input.value;
        document.write('<img src="' + imageUrl + '">');  // Using document.write