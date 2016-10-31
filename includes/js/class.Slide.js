
 function Slide(name, timeout, popups) {

     // attributs
     // -----------------------------
     this.name = name;
     this.timeout = timeout;

     if(popups != undefined)
         this.popups = popups;
     else
         this.popups = null;


     // méthodes
     // -----------------------------
     this.addPopup = function () {
         this.popups = new Popup();
     }

     
 }