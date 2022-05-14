let ani1E = document.querySelectorAll(".product-sec1");
let bodi = document.querySelectorAll("body")["0"].childNodes;
console.log(bodi);
console.log(ani1E);
window.addEventListener("load", function () {
  //   document.querySelector(".loader").style.opacity = "1";
  let time = setTimeout(function () {
    document.querySelector(".loader").style.display = "none";
    // document.querySelector("body").style.transition = "all 2s";
    // document.querySelector("body").style.display = "block";
  }, 2000);
  window.addEventListener("scroll", function () {
    let arr = [...ani1E];
    //   console.log()
    arr.map((e) => {
      if (window.pageYOffset >= e.offsetTop) {
        e.classList.add("ani1");
      }
    });
    //   if () {
    //   }
  });
});
// window.addEventListener("scroll", function () {
//   let arr = [...ani1E];
//   //   console.log()
//   arr.map((e) => {
//     if (window.pageYOffset >= e.offsetTop) {
//       e.classList.add("ani1");
//     }
//   });
//   //   if () {
//   //   }
// });
