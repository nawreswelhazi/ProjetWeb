<section class="ConxSection">

        <div class="wrapper" id="wrapper">

          <div class="form-box login">
          
              <h2>Login</h2>
              <span id="error_message"></span>
         

              <form method="post" id="login_form">

                  <div class="input-box">

                      <span class="icon"><i class="bi bi-envelope-fill"></i></span>

                      <input type="email" name="email" required>

                      <label>Email</label>

                  </div>

                  <div class="input-box">

                      <span class="icon"><i class="bi bi-lock-fill"></i></span>

                      <input type="password" name="password" required>

                      <label>Mot de passe</label>

                  </div>

                  <div class="remember-forget">

                      <label><input type="checkbox">Remember me</label>

                      <a href="#">Mot de passe oublié?</a>

                  </div>

                  <button type="submit" id="submit" value="nogin" name="submit" class="btn">Connexion</button>

                  <div class="login-register">

                      <p>Vous n'avez pas de compte? <a href="#" class="register-link">Inscrivez-vous</a></p>

                  </div>

              </form>

          </div>

        </div>

        <div id="overlay"></div>

      </section>
      <script>
$(document).ready(function(){
 $('#login_form').on('submit', function(event){
    
  event.preventDefault();
  $.ajax({
   url:"check_login.php",
   method:"POST",
   data:$(this).serialize(),
   success:function(data){
    if(data != '')
    {
       
     $('#error_message').html(data);
    }
    else
    {
      
     window.location = 'index.php';
    }
   }
  })
 });
});
</script>


