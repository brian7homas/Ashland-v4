class FormReset{
    constructor(){
        console.log("form reset");
        this.form = document.querySelector('#form');
        this.button = document.querySelector('#clear');
        this.events();
    }
    events(){
        document.getElementById('clear').addEventListener('click', ()=>this.clear());
        
    }
    clear(){
        this.form.reset();
    }


}
export default FormReset;