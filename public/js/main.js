gsap.registerPlugin(ScrollTrigger, CSSRulePlugin);
const cardTitle = $(".card-title");


// // //click event for toggle list and list div
// toggleList.addEventListener("click", () => {
// //   //conditional needs a double equals
//   if (listDiv.style.display == "none") {
// //     //if the display is set to none it will display block
//     toggleList.textContent = "Hide list";
//     listDiv.style.display = "block";
//   } else {
//     toggleList.textContent = "Show list";
//     listDiv.style.display = "none";
//   }
// });
// gsap.fromTo(".hamburger", 2, { duration: 3, yPercent: -200 }, { yPercent: 30 });
function moveUp(){
  const hamburger = $('.hamburger');
  gsap.to(hamburger, {yPercent: -100});
}
//CARD HOVER ANIMATIONS( HOMEPAGE )

cardTitle.hover(
  function () {
    // index of card
    var card = cardTitle.index(this);
    // sets the index to card variable
    var card = $(`.card`).get(card);
    // animaition
    TweenLite.to(card, { scale: 1.5, ease: Power1.easeInOut });
  },
  //scale back to 1 animaiton
  function () {
    var card = cardTitle.index(this);
    var card = $(`.card`).get(card);
    TweenLite.to(card, { scale: 1, ease: Power3.easeOut });
  }
);

// functioning hover statement
// $(".card-block").hover(
//   function () {
//     $(this).
//   },
//   function () {
//     title.reverse();
//   }
// );

//adds hidden class to all card-blck els
// $(".card-block").each(function (i, obj) {
//   $(this).addClass("hidden");

// });
/********************************** */
// document.querySelector(".card-block").onmouseleave = () => this.twwen.reverse();

// $(".card-title").hover(
//   function () {
//     $(this).css("background-color", "yellow");
//     $(this).css("transform", "scaleY(1.1)");
//   },
//   function () {
//     $(this).css("transform", "scale(1)");
//     $(this).css("background-color", "none");
//   }
// );

gsap.from(".card-block", {
  scrollTrigger: {
    trigger: ".content",
    start: "top",
    end: "center",
  },
  y: 100,
  stagger: 0.5,
  opacity: 0,
  duration: 1,
});
