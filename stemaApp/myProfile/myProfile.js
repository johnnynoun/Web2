function Validate() {
        var password = document.getElementById("np").value;
        var confirmPassword = document.getElementById("cf").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
