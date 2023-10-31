<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="conx.css">

<?php
    $con = mysqli_connect("localhost","root","","web");
?>

<section class="ConxSection">
    <div class="wrapper" id="wrapper">

        <span class="icon-close" id="btnClose"><i class="bi bi-x-lg"></i></span>
        
        <div class="form-box login">
            <h2>Login</h2>
            <span id="error_message"></span>
            <form method="post" id="login_form">
                <div class="input-box">
                    <span class="icon"><i class="bi bi-envelope-fill"></i></span>
                    <input type="email" name="email" id="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password" id="password" required>
                    <label>Mot de passe</label>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox">Se souvenir de moi</label>
                    <a href="#">Mot de passe oublié?</a>
                </div>
                <button type="submit" id="submit" value="login" name="submit" class="btnConnect">Se connecter</button>

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
            <span id="error_message_register"></span>
            <span id="sucess_message_register"></span>
            <form method="POST" id="register_form">
                <div class="row  g-2 py-2" >
                    <div class="input-box col-lg-4">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input type="text" id="nom" name="nom" required>
                        <label>Nom</label>
                    </div>

                    <div class="input-box col-lg-4">
                        <span class="icon"><i class="bi bi-person-fill"></i></span>
                        <input type="text" id="prenom" name="prenom" required>
                        <label>Prénom</label>
                    </div>

                    <div class="input-box col-lg-4">
                        <input type="date" name="dateNaissance" id="birthday" required>
                    </div>
                </div>
                

                <div class="row  g-2 py-2" >
                   <div class="input-box col-lg-12">
                        <span class="icon"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" id="emailProposed" name="email" required>
                        <label>Email</label>
                    </div>
                </div>

                <div class="row  g-2 py-2" >
                   <div class="input-box col-lg-6">
                        <span class="icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" id="PasswordProposed" required>
                        <p id="validity">Mot de passe <span id="strength"></span></p>
                        <label>Mot de passe</label>
                    </div>
                    <div class="input-box col-lg-6">
                        <span class="icon"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="confPassword" id="PasswordProposed2" required>
                        <p id="validity2">Mot de passe <span id="strength2"></span></p>
                        <label>Confirmer le mot de passe</label>
                    </div>
                </div>
                <div class="row  g-2 py-2" >
                    <button type="submit" id="btnInscription" name="submit" value="register"  class="btnRegister col-lg-6">S'inscrire</button>
                    <div class="login-register col-lg-6">
                        <p>Déjà inscrit? <a id=reOpenConnect href="#" class="register-link">Connectez-vous</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div id="overlay"></div>
</section>
<script src="script.js"></script>
<script src="passwordFort.js"></script>




<script>
    $(document).ready(function(){
    $('#login_form').on('submit', function(event){
        
    event.preventDefault();
    $.ajax({
    url:"check_login.php",
    method:"POST",
    data:$(this).serialize(),
    success:function(data){
        if((data.includes("Succes"))==false)
        {
           
        
        $('#error_message').html(data);
        }
        else
        {
           
            closeModal();
            location.reload();
            


        }
    }
    })
    });
    $('#register_form').on('submit', function(event){
        
        event.preventDefault();
        $.ajax({
        url:"inscription.php",
        method:"POST",
        data:$(this).serialize(),
        success:function(data){
            if((data.includes("Successful"))==false)
            {
               
            
            $('#error_message_register').html(data);
            ViderChampsInscri();
           
            }
            else
            {   
                $('#sucess_message_register').html(data);               
                closeModalRegister();


               
                
    
    
            }
        }
        })
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


