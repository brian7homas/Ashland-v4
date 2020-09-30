gsap.config(
  {
    nullTargetWarn : false,
  }
)

gsap.registerPlugin(ScrollTrigger, CSSRulePlugin);
const cardTitle = $(".card-title");

// gsap.set(".hamburger",{xPercent:240, paused:true, reversed:true, ease: Power1.easeInOut})

let tl = gsap.timeline({ease: Power3.easeInOut});
tl.from(".user-nav-list", {height: 0, display:"none", xPercent:0, reversed:true, ease: Power1.easeInOut })
  .from(".hamburger",{xPercent:240, reversed:false})
  .from(".nav-item", { opacity:0, reversed:true}, "-=1")
  


// HAMBURGER/MENU  ANIMATION
var tween = TweenLite.from ('.user-nav-list', { height: 0,  display: "none", xPercent: 0, paused: true, reversed:true});
let hamburger = TweenLite.from (".hamburger", {xPercent: 240, paused: true, reversed:true, ease: Power1.easeInOut });



document.querySelector(".navbar").addEventListener("click", doCoolStuff);

function doCoolStuff() {
  tl.reversed() ? tl.play() : tl.reverse();
  // hamburger.reversed() ? hamburger.play() : hamburger.reverse();
  // tween.reversed() ? tween.play() : tween.reverse();
  
  // if($( "nav" ).css( 'overflow') !== "visible"){
  //     console.log("hidden");
  //     $( "nav" ).css( 'overflow' , 'visible')
  // }else{
  //   console.log("not hidden");
  //   $( "nav" ).css( 'overflow' , 'hidden')
  // }
  
  
}



//CARD HOVER ANIMATIONS( HOMEPAGE )
cardTitle.hover(
  function () {
    // index of card
    var card = cardTitle.index(this);
    // sets the index to card variable
    var card = $(`.card`).get(card);
    // animaition
    TweenLite.to(card, { scale: 1.1, ease: Power1.easeInOut });
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
