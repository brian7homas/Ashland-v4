class FormReset{
    constructor(){
        console.log("form reset");
        this.form = document.querySelector('#form');
        this.button = document.getElementById('clear');
        console.log(this.button);
        this.events();
        
    }
    events(){
        
        this.button.addEventListener('click', ()=>this.clear());
        
    }
    clear(){
        this.form.reset();
    }


}
export default FormReset;