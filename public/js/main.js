gsap.config(
  {
    nullTargetWarn : false,
  }
)
gsap.registerPlugin(ScrollTrigger, CSSRulePlugin);


// gsap.set(".hamburger",{xPercent:240, paused:true, reversed:true, ease: Power1.easeInOut})


// let tl = gsap.timeline({ease: Power3.easeInOut});

// tl.from(".user-nav-list", { height: 0, display:"none", xPercent:0, reversed:true, ease: Power1.easeInOut })
//   .from(".hamburger",{autoAlpha: 0, xPercent:240, reversed:false})
//   .from(".nav-item", { opacity:0, reversed:true}, "-=1")
  



// HAMBURGER/MENU  ANIMATION
// var tween = TweenLite.from ('.user-nav-list', { height: 0,  display: "flex", xPercent: 0, paused: true, reversed:true});
// let hamburger = TweenLite.from (".hamburger", {xPercent: 240, paused: true, reversed:true, ease: Power1.easeInOut });

// document.querySelector(".navbar").addEventListener("click", doCoolStuff);

// function doCoolStuff() {



//   tl.reversed() ? tl.play() : tl.reverse();  
// }





//CARD HOVER ANIMATIONS( HOMEPAGE )
const cardTitle = $(".card-block");
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

gsap.from(".card-block", {
  scrollTrigger: {
    trigger: ".content",
    start: "top",
    end: "top",
  },
  y: 100,
  stagger: 0.5,
  opacity: 0,
  duration: 1,
});
