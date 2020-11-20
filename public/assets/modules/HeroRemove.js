class HeroRemove{
    constructor(){
        this.tl = gsap.timeline({delay: 2});
        this.hero = document.querySelector(".hero");
        this.textContainer = document.querySelector(".hero > container");
        this.logo = document.querySelector('#hero-logo');
        this.row = document.querySelector('.row');
        this.main = document.querySelector('#wrapper');
        this.animate();
    }
    
    animate(){
        this.tl.to(this.row, {height: '0vh', duration: 2.5, opacity:0, display:"none"})
        this.tl.to(this.logo, {opacity:0, display:"none", sclae:'.6'}, "<")
        this.tl.to(this.main, {height: '100%', zIndex:3}, "<")
        this.tl.to(this.hero, {padding:0, height: '0vh', duration: 3}, "<.2")
    }
    
}
export default HeroRemove;