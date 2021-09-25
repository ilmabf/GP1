var btnsTip = document.getElementsByClassName("button");
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

// const btnsTip1 = document.getElementsByClassName(".button1");
// let activeBtn1 = null;

// btnsTip1.forEach((btnTip1) => {
//   btnTip1.addEventListener("click", (e) => {
//     e.currentTarget.classList.add("active");

//     if ((activeBtn1 != null && activeBtn1 != e.currentTarget)) {
//       activeBtn.classList.remove("active");
//     }

//     activeBtn1 = e.currentTarget;
//   });
// });
