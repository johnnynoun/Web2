<?php include('stemaApp.php'); ?>
    <div class="center-screen">

      <div class="log-in-form">

        <div class="log-in-header">
        <h1> Reset Password </h1>
      </div>
      <div class="sign-up">
        <p class="reset-pass-info">
        An email with a link to reset your password will be sent to your address
    </p>
    </div>
      <div class="log-in-user-info">

          <form  method="post" action="reset-pass.php">
          <input type="email"  name="email-recipient" maxlength="40" placeholder="Enter you email" > <br>
        <input type="submit" class="log-in-submit" value="Send email" name="send-verification-email">
      </form>

     </div>
    </div>
