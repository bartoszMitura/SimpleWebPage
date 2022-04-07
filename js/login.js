

function goToReg(){
    location.href="../php/registration.php";
}
function goToLogin(){
    location.href = "../php/login.php";
}


let btn = document.getElementById("logOut");
btn.addEventListener("click", ()=>{
    let btnValue = btn.value;
    
    $.post("php/logOut.php",{
        btnValue : btnValue
    }, (response) => {
        console.log(response);
    });
})