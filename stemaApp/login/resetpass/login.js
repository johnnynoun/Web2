function Toggle() {
           var temp = document.getElementById("password");
           if (temp.type === "password") {
               temp.type = "text";
           }
           else {
               temp.type = "password";
           }
       }


       var myVar;

       function Functiontimer() {
         myVar = setTimeout(alertFunc, 1000);
       }

       function alertFunc() {
         alert("This Phone number is not registered yet, please SIGN UP.");
       }
