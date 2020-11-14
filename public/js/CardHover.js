class CardHover{
    constructor(){
        console.log("card hover");
        this.tl = gsap.timeline({ease: Power3.easeInOut});
        this.cardTitle = new Array();
        this.cardTitle = document.querySelectorAll(".card-block"); 
        this.events();
        
    }
    events(){
        for(var i=0; i<this.cardTitle.length; i++){
            this.cardTitle[i].addEventListener("mouseenter", (i)=>this.mouseIn(i));
            this.cardTitle[i].addEventListener("mouseleave", (i)=>this.mouseOut(i));
        }
        
    }
    mouseIn(i){
        console.log(i.target)
        console.log(this.cardTitle[i.target]);
        this.tl.to(i.target, {scale:1.1, ease: Power1.easeInOut});
    }
    mouseOut(i){
        console.log("mouseleave");
        this.tl.to(i.target, {scale:1, ease: Power1.easeInOut});
    }
}
export default CardHover;