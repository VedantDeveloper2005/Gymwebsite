function openImage(icon) {
    // Get the image source from the parent gallery item
    const imageSrc = icon.parentNode.getAttribute('data-src');

    // Create an enlarged image container
    const enlargedImage = document.createElement('div');
    enlargedImage.classList.add('enlarged-image');
    enlargedImage.innerHTML = `<img src="${imageSrc}" alt="Enlarged Image">`;

    // Append the enlarged image container to the body
    document.body.appendChild(enlargedImage);

    // Add a class to show the enlarged image
    setTimeout(() => {
        enlargedImage.classList.add('show');
    }, 50);

    // Close the enlarged image on click
    enlargedImage.addEventListener('click', function () {
        this.classList.remove('show');
        setTimeout(() => {
            this.remove();
        }, 300);
    });
}

document.querySelector(".mobile-btn").addEventListener("click", function () {
    document.querySelector(".menu").classList.toggle("active");
  });


//login script
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
