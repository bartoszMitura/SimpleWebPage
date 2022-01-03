/*!
* Start Bootstrap - Agency v7.0.0 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    

});

function sprawdzPole(pole_id,obiektRegex) {
    
    var obiektPole = document.getElementById(pole_id);
    if(!obiektRegex.test(obiektPole.value)) return (false);
    else return (true);
}

function sprawdz_box(box_id)
{   
    var obiekt=document.getElementById(box_id);
    if (obiekt.checked) return true;
    else return false;
}
function sprawdz(){ 
    
    var ok=true; 
    obiektLastName = /^[a-zA-Z]{2,20}$/; 
    obiektName = /^[a-zA-Z]{2,20}$/;
    obiektemail = /^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]+)+/;
    obiektWiek=/^[1-9][0-9]{1,2}$/;
  
    if (!sprawdzPole("lastName",obiektLastName)){   
            ok=false;
            document.getElementById("lastNameError").innerHTML="Wpisz poprawnie nazwisko!";
        }
    else document.getElementById("lastNameError").innerHTML="";

    


    if (!sprawdzPole("fname",obiektName)){   
        ok=false;
        document.getElementById("nameError").innerHTML="Wpisz poprawnie imię!";
    }
    else document.getElementById("nameError").innerHTML="";
    
    
    if (!sprawdzPole("age",obiektWiek)){   
            ok=false;
            document.getElementById("ageError").innerHTML=
            "Wpisz poprawnie wiek!";
        }
    else document.getElementById("ageError").innerHTML="";
    
    


     if (!sprawdzPole("email",obiektemail)){   
            ok=false;
            document.getElementById("emailError").innerHTML=
            "Wpisz poprawnie e-mail!";
        }
    else document.getElementById("emailError").innerHTML="";
    
     if (!sprawdz_box("administracjaSieci") && !sprawdz_box("aplikacjeInternetowe") && !sprawdz_box("bezpieczenstwoInformacji") ){   
            ok=false;
            document.getElementById("checkError").innerHTML=
            "Musisz wybrać produkt!";
        }
    else document.getElementById("checkError").innerHTML="";
    
  
    
    if(ok==true){
        var tresc = '<button type="button" class="btn btn-default btn-lg" id="mybutton" onclick="usunZgloszenie();">Usuń zgłoszenie</button>'
        
        document.getElementById('change').innerHTML = tresc;
    }
        
  
    return ok;
    
}

function zapisz(event){

    if(sprawdz()){
    event.preventDefault();
    const data = new FormData(event.target);
    const value = Object.fromEntries(data.entries());

    value.produkt = data.getAll("produkt");
    console.log({ value});

    var lista = JSON.parse(localStorage.getItem('lista'));
    if(lista===null)lista=[];
    var dlugosc = lista.length;
    
    var i = 0;
    var ok = true;


    for( i=0; i<dlugosc;i++){
        if( lista[i].email === value.email){
        
        ok = false;
        }
    }
    if(ok == true){
    lista.push(value);
    localStorage.setItem('lista', JSON.stringify(lista));}
    else{
        userError();
    }
   
      
    }
    
    
}

const form = document.querySelector('form');
form.addEventListener('submit',pokazDane);
form.addEventListener('submit', zapisz);

function usunZgloszenie(){
    var lista = JSON.parse(localStorage.getItem('lista'));
    
    if (confirm("Usunąć zglosznie użytkownika o adresie e-mail: "+lista[lista.length-1].email+"?")) lista.splice(lista.length-1,1);
 
    localStorage.setItem('lista', JSON.stringify(lista)); 

    
  

}


  function pokazDane()
{

    var dane="Następujące dane zostaną wysłane:\n";
    dane+="Imię: "+fname.value+"\n";
    dane+="Nazwisko: "+lastName.value+"\n";
    dane+="Numer telefonu: "+phone.value+"\n";
    dane+="Email: "+email.value+"\n";
    dane+="Adres: "+adress.value+"\n";
    dane+="Wiek: "+age.value+"\n";

 if (window.confirm(dane)) return true;
 else return false;
}

function userError(){
    window.alert("Użytkownik o podanym adresie E-mail juz jest zarejestrowny!")
}