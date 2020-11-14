import '../style.css';
import Hamburger from '../js/Hamburger';
import CardHover from '../js/CardHover';



new Hamburger(); 
new CardHover(); 

//accept the hot update
if(module.hot){
    module.hot.accept();
}