function changeCss () {
  var navElement = document.querySelector(".dropdown-homepage");
  this.scrollY > 300 ? navElement.style.color = "#1e1e1e" : navElement.style.color = "#fff";
  console.log(scrollY);
}

window.addEventListener("scroll", changeCss , false);