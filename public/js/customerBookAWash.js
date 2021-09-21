var i = 0;
var txt = 'Pick the time & give your location. We WandiWash ready to wash your vehicle. We are Eco Friendly.';
var speed = 50;

function typeWriter() {
  if (i < txt.length) {
    document.getElementById("sub-heading-p").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
} 

const btnsTip = document.querySelectorAll(".button");
let activeBtn = null;

btnsTip.forEach((btnTip) => {
  btnTip.addEventListener("click", (e) => {
    e.currentTarget.classList.add("active");

    if ((activeBtn != null && activeBtn != e.currentTarget)) {
      activeBtn.classList.remove("active");
    }

    activeBtn = e.currentTarget;
  });
});

