var Form1 = document.querySelector("#Form1");
var Form2 = document.querySelector("#Form2");
var Form3 = document.querySelector("#Form3");

var Next1 = document.querySelector("#Next1");
var Next2 = document.querySelector("#Next2");
var Back1 = document.querySelector("#Back1");
var Back2 = document.querySelector("#Back2");

var progress = document.querySelector("#progress");

Next1.addEventListener("click", () => {
  Form1.style.left = "-450px";
  Form2.style.left = "40px";
  progress.style.width = "240px";
});

Back1.addEventListener("click", () => {
  Form1.style.left = "40px";
  Form2.style.left = "450px";
  progress.style.width = "120px";
});

Next2.addEventListener("click", () => {
  Form2.style.left = "-450px";
  Form3.style.left = "40px";
  progress.style.width = "360px";
});

Back2.addEventListener("click", () => {
  Form2.style.left = "40px";
  Form3.style.left = "450px";
  progress.style.width = "240px";
});
