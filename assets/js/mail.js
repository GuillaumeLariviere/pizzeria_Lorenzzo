/* CONFIRMATION EMAIL */


function confirmEmail() {
    var email = document.getElementById("email").value
    var confemail = document.getElementById("confemail").value
    if(email != confemail) {
        alert('Attention ! \nVotre confirmation d\'email doit être identique de votre email.');
    }
}
