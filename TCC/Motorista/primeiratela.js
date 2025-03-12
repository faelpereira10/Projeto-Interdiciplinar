var expanded = false;
var content = document.getElementById("content");
var footer = document.getElementById("footer");

function toggleExpansion() {
  if (expanded) {
    content.style.height = "0";
    expanded = false;
  } else {
    var windowHeight = window.innerHeight;
    var halfHeight = windowHeight / 2;
    content.style.height = halfHeight + "px";
    expanded = true;
  }
}

window.addEventListener("resize", function() {
  if (expanded) {
    var windowHeight = window.innerHeight;
    var halfHeight = windowHeight / 2;
    content.style.height = halfHeight + "px";
  }
});
