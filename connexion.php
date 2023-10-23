<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<section class="ConxSection">
    <div class="wrapper" id="wrapper">

        <span class="icon-close" id="btnClose"><i class="bi bi-x-lg"></i></span>

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
                    <label><input type="checkbox">Se souvenir de moi</label>
                    <a href="#">Mot de passe oublié?</a>
                </div>
                <button type="submit" id="submit" value="login" name="submit" class="btn">Se connecter</button>

                <div class="login-register">
                    <p>Vous n'avez pas de compte? <a id=PopUpRegister href="#" class="register-link">Inscrivez-vous</a></p>
                </div>
            </form>
        </div>
    </div>

    <div class="wrapper" id="wrapperRegister">
        <span class="icon-close" id="btnClose1"><i class="bi bi-x-lg"></i></span>

        <div class="form-box register">
            <h2>S'inscrire</h2>
            <form action="#">
                <div class="row  g-2 py-2" >
                    <div class="input-box col-lg-4">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input type="text" required>
                        <label>Nom</label>
                    </div>

                    <div class="input-box col-lg-4">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input type="text" required>
                        <label>Prénom</label>
                    </div>

                    <div class="input-box col-lg-4">
                        <input type="date" required>
                        <label>Date de naîssance</label>
                    </div>
                </div>

                <div class="row  g-2 py-2" >
                    <div class="input-box col-lg-12">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input type="text" required>
                        <label>Adresse</label>
                    </div>
                </div>

                <div class="row  g-2 py-2" >
                    <div class="input-box col-lg-6">
                        <span class="icon"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box col-lg-6">
                        <span class="icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" required>
                        <label>Mot de passe</label>
                    </div>
                </div>
                <div class="row  g-2 py-2" >
                    <button type="submit" class="btnRegister col-lg-6">Se connecter</button>
                    <div class="login-register col-lg-6">
                        <p>Déjà inscrit? <a href="#" class="register-link">Connectez-vous</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div id="overlay"></div>
</section>

<script src="script.js"></script>

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


