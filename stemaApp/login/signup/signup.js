function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }


    function Toggle() {
               var temp = document.getElementById("password");
               var temp2 = document.getElementById("confirm_password");

               if ((temp.type === "password") && (temp2.type === "password")) {
                   temp.type = "text";
                   temp2.type = "text";
               }
               else {
                   temp.type = "password";
                   temp2.type = "password";
               }
           }


      
