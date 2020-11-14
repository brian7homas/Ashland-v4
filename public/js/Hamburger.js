import { Power1, Power3 } from "gsap";
import gsap from "gsap/gsap-core";
class Hamburger{
    constructor(){
        console.log('hamburger');
        this.navbar = document.querySelector('.navbar');
        this.animate = gsap.timeline({ease:Power3.easeInOut});
        this.hamburger();
        this.tween = TweenLite.from('.user-nav-list', { height: 0, xPercent: 0, paused: true, reversed:true});
        this.hamburger = TweenLite.from(".hamburger", {xPercent: 240, paused: true, reversed:true, ease: Power1.easeInOut });
        this.events();
    }
    events(){
        this.navbar.addEventListener("click", ()=>this.docoolSuff());
    }
    hamburger(){
        
        this.animate.from(".user-nav-list", {height:0, display: "none", xPercent:0, reversed: true, ease: Power1.easeInOut})
                    .from(".hamburger",{xPercent:240, reversed:false})
                    .from(".nav-item", { opacity:0, reversed:true}, "-=1");
    }
    docoolSuff(){
        this.animate.reversed() ? this.animate.play() : this.animate.reverse(); 
    }
}
export default Hamburger;