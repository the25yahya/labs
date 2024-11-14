const imageContainer = document.querySelector(".image-container")
const input = document.querySelector("#input")
const btn = document.querySelector(".btn")


btn.addEventListener("click",function(){
    let imageUrl = input.value;
    const img = document.createElement('img');
    img.src = imageUrl;
    imageContainer.appendChild(img)   
})