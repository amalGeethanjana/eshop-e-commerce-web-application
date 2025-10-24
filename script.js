function changeView(){
   var signUpBox = document.getElementById("signUpBox");
   var signInBox = document.getElementById("signInBox");

   signInBox.classList.toggle("d-none");
   signUpBox.classList.toggle("d-none");
}
function signup(){
   var fname =document.getElementById("fname");
   var lname =document.getElementById("lname");
   var email = document.getElementById("email");
   var password = document.getElementById("password");
   var mobile = document.getElementById("mobile");
   var gender = document.getElementById("gender");

   var form = new FormData();
   form.append("f",fname.value);
   form.append("l",lname.value);
   form.append("e",email.value);
   form.append("p",password.value);
   form.append("m",mobile.value);
   form.append("g",gender.value);

   var request = new XMLHttpRequest();

   request.onreadystatechange = function () {
      if (request.status == 200 && request.readyState == 4) {
         var response = request.responseText;
         if (response == "success") {
            document.getElementById("msg").innerHTML = "Registrayion Successfull";
            document.getElementById("msg").className = "alert alert-success";
            document.getElementById("msgdiv").className = "d-block";
         } else {
             document.getElementById("msg").innerHTML = response;
            document.getElementById("msgdiv").className = "d-block";
         }
      }
   }

   request.open("POST","signupProcess.php",true);
   request.send(form);
   
}

function signin(){
   var email = document.getElementById("email2");
   var password = document.getElementById("password2");
   var rememberme = document.getElementById("rememberme")
   var f = new FormData;
   f.append("e",email.value);
   f.append("p",password.value);
   f.append("r",rememberme.checked);

  var request =  new XMLHttpRequest();

  request.onreadystatechange = function () {
   if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "success") {
            document.getElementById("msg2").innerHTML = "Login Successfull";
            document.getElementById("msg2").className = "alert alert-success";
            document.getElementById("msgdiv2").className = "d-block";
            window.location = "home.php"
         } else {
             document.getElementById("msg2").innerHTML = response;
            document.getElementById("msgdiv2").className = "d-block";
         }

   }
  }

  request.open("POST","signinProcess.php");
  request.send(f)

}