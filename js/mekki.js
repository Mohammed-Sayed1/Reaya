var image = document.getElementById("images");
var images = [
    "./images/20.png",
    "./images/29.png",
    "./images/21.png",
    "./images/27.png",
    "./images/25.png",
    "./images/28.png",
];

setInterval(function() {
    var random = Math.floor(Math.random() * 6);
    image.src = images[random];
}, 2500);