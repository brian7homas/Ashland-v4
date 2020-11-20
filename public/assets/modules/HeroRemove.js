class HeroRemove{
    constructor(){
        this.tl = gsap.timeline({delay: 2});
        this.hero = document.querySelector(".hero");
        this.textContainer = document.querySelector(".hero > container");
        this.logo = document.querySelector('#hero-logo');
        this.row = document.querySelector('.row');
        this.main = document.querySelector('#wrapper');
        this.teamDiv = document.querySelector(".team");
        this.animate();
    }
    
    animate(){
        this.tl.to(this.row, {height: '0vh', duration: 2.5, opacity:0})
        this.tl.to(this.teamDiv, {paddding:0, duration: 2}, "<")
        this.tl.to(this.logo, {opacity:0, display:"none", sclae:'.6', duration:2}, "<")
        this.tl.to(this.main, {height: '100vh', zIndex:3, marginBottom: "3em", duration: 2}, "<")
        this.tl.to(this.hero, {padding:0, height: '0vh', duration: 3}, "<.2")
    }
    
}
export default HeroRemove;