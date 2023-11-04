<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Mon profil</title>
    <link rel="stylesheet" href="styleProfil.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<?php include("include/noLoginRedirect.php"); ?>
    <?php include 'include/nav.php' ?>
    <?php include 'connexion.php' ?>
   
    

    





    <?php
    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }




    $userId = $_SESSION["id"];
    $get_user = "select * from client where id='$userId'";
    $run_user = mysqli_query($con, $get_user);
    $check_user = mysqli_num_rows($run_user);
    if ($check_user == 0) {
        echo "<script> window.open('index.php','_self') </script>";
    } else {
        //gathering info about product in variables
        $row_user = mysqli_fetch_array($run_user);
        $user_mail = $row_user['email'];
        $user_nom = $row_user['nom'];
        $user_prenom = $row_user['prenom'];
        $user_dateNaissance = $row_user['dateNaissance'];
        $user_adresse = $row_user['adresse'];
        $user_num = $row_user['nrTelph'];
        $user_pays = $row_user['Pays'];
        $user_image = $row_user['photo'];
        $user_currentMDP = $row_user['password'];
    }


    ?>




    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-4 mb-3">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a id="ongletGeneral" class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a id="ongletMDP" class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Mot de passe</a>

                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-info">Commandes</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <?php
                                $cheminAvatarParDefaut = "https://bootdey.com/img/Content/avatar/avatar1.png";

                                // Vérifiez si le champ photo du client est vide
                                if ($user_image === "") {
                                    // Si le champ est vide, affichez l'avatar par défaut
                                    echo '<img id="userImage" src="' . $cheminAvatarParDefaut . '" alt class="d-block ui-w-80">';
                                } else {
                                    // Sinon, affichez la photo du client
                                    echo '<img id="userImage" src="' . $user_image . '" alt class="d-block ui-w-80">';
                                }
                                ?>
                                <div class="media-body ml-4">
                                    <label class="btn btn-outline-primary" id='maj'>
                                        Mettre à jour
                                        <input type="file" id="imagePInput" class="account-settings-fileinput"
                                            accept="image/*">
                                    </label> &nbsp;
                                    <button type="button" class="btn btn-default md-btn-flat">Réinitialiser</button>
                                    <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        // Lorsque le champ de fichier est modifié
                                        $('#imagePInput').on('change', function () {
                                            // Obtenez le fichier sélectionné
                                            var file = this.files[0];
                                            console.log(file);
                                            console.log(file['name']);

                                            if (file) {
                                                // Créez un objet URL pour le fichier
                                                var imageUrl = URL.createObjectURL(file);
                                                console.log(imageUrl);

                                                // Mettez à jour l'attribut "src" de l'image avec l'URL du fichier
                                                $('#userImage').attr('src', imageUrl);
                                            }
                                        });
                                    });
                                </script>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Numéro client</label>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nom de famille</label>
                                    <input data-target="Nom" id="nomP" type="text" class="form-control" name="userNom"
                                        value="<?php echo $user_nom; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Prénom</label>
                                    <input type="text" id="prenomP" class="form-control"
                                        value="<?php echo $user_prenom; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Anniversaire</label>
                                    <input type="date" id="annivP" class="form-control"
                                        value="<?php echo $user_dateNaissance; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Pays</label>
                                    <select id="paysP" class="custom-select" value="<?php echo $user_pays; ?>">
                                        <option <?php if ($user_pays == "Belgique")
                                            echo "selected"; ?>></option>
                                        <option value="Belgique" <?php if ($user_pays == "Belgique")
                                            echo "selected"; ?>>
                                            Belgique</option>
                                        <option value="Suisse" <?php if ($user_pays == "Suisse")
                                            echo "selected"; ?>>
                                            Suisse</option>
                                        <option value="Italie" <?php if ($user_pays == "Italie")
                                            echo "selected"; ?>>
                                            Italie</option>
                                        <option value="Allemagne" <?php if ($user_pays == "Allemagne")
                                            echo "selected"; ?>>Allemagne</option>
                                        <option value="France" <?php if ($user_pays == "France")
                                            echo "selected"; ?>>
                                            France</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Contacts</h6>
                                <label class="form-label">E-mail</label>
                                <input type="email" id="mailP" class="form-control mb-1"
                                    value="<?php echo $user_mail; ?>">
                                <div class="alert alert-warning mt-3">
                                    Your email is not confirmed. Please check your inbox.<br>
                                    <a href="javascript:void(0)">Resend confirmation</a>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Numéro de téléphone</label>
                                    <input type="tel" id="numP" class="form-control" value="<?php echo $user_num; ?>"
                                        pattern="[0-9]{10}">
                                </div>
                            </div>
                        </div>



                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Mot de passe actuel</label>
                                    <input id="mdpAP" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <input id="mdpNP" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Resaisir le nouveau mot de passe</label>
                                    <input id="mdpN2P" type="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body pb-2">
                                <h5 class="mb-4">Commandes Précédentes</h5>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Date</th>

                                            <th>Opérations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $get_commandes = "SELECT commande.* FROM commande where commande.id_client = $userId ORDER BY commande.date DESC limit 20";
                                        $run_commandes = mysqli_query($con, $get_commandes);
                                        $i = 1;
                                        while ($commande = mysqli_fetch_array($run_commandes)) {

                                            ?>
                                            <tr>
                                               
                                                <td id="commande_id">
                                               
                                                    <?php echo $commande['id'];
                                                     ?>
                                                </td>

                                                <td>
                                                    <?php echo $commande['date'] ?>
                                                </td>



                                                <td><a id="details" class="btn btn-outline-dark view_commande"
                                                      href="#" >détails</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" class="form-control" value="https://twitter.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" value="https://www.facebook.com/user">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Google+</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" class="form-control" value>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" value="https://www.instagram.com/user">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <button type="button" class="btn btn-twitter">Connect to
                                    <strong>Twitter</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <h5 class="mb-2">
                                    <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                            class="ion ion-md-close"></i> Remove</a>
                                    <i class="ion ion-logo-google text-google"></i>
                                    You are connected to Google:
                                </h5>
                                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                    data-cfemail="f9979498818e9c9595b994989095d79a9694">[email&#160;protected]</a>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-facebook">Connect to
                                    <strong>Facebook</strong></button>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <button type="button" class="btn btn-instagram">Connect to
                                    <strong>Instagram</strong></button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Activity</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone comments on my article</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone answers on my forum
                                            thread</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Email me when someone follows me</span>
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body pb-2">
                                <h6 class="mb-4">Application</h6>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">News and announcements</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input">
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly product updates</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switcher">
                                        <input type="checkbox" class="switcher-input" checked>
                                        <span class="switcher-indicator">
                                            <span class="switcher-yes"></span>
                                            <span class="switcher-no"></span>
                                        </span>
                                        <span class="switcher-label">Weekly blog digest</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-primary " id="sauvegarder" data-role="update"
                data-id="<?php echo $userId; ?>">Sauvegarder</button> &nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div>


        <script>
            $(document).ready(function () {
                $(document).on('click', 'button[data-role=update]', function () {
                    var id = $(this).data('id');
                    var general = document.getElementById('ongletGeneral');
                    var mdp = document.getElementById('ongletMDP');
                    if (general.classList.contains('active')) {
                        var nom = document.getElementById("nomP").value;
                        var prenom = document.getElementById("prenomP").value;
                        var anniversaire = document.getElementById("annivP").value;
                        console.log(anniversaire, "weey");
                        var mail = document.getElementById("mailP").value;
                        var num = document.getElementById("numP").value;
                        var pays = document.getElementById("paysP").value;
                        var image = document.getElementById("userImage").getAttribute('src');

                        if (nom !== "" && prenom !== "" && anniversaire !== "" && mail !== "") {
                            $.ajax({
                                url: 'modifProfil.php',
                                method: 'post',
                                data: { nom: nom, prenom: prenom, anniversaire: anniversaire, mail: mail, num: num, pays: pays, image: image, id: id },
                                success: function (response) {
                                    Swal.fire('Mise à jour réussie', '', 'success');
                                    console.log(response);
                                }

                            });
                        }
                        else {
                            Swal.fire('Vérifiez vos données', '', 'failure');
                        }
                    }
                    else if (mdp.classList.contains('active')) {
                        var mdpActuel = document.getElementById("mdpAP").value;
                        var mdpNouv = document.getElementById("mdpNP").value;
                        var mdpNouv2 = document.getElementById("mdpN2P").value;
                        var userCurrentMDP = '<?php echo $user_currentMDP; ?>';
                        if (mdpActuel !== "" && mdpNouv !== "" && mdpNouv2 !== "") {
                            if (password_verify(mdpActuel, userCurrentMDP)) {
                                if (mdpNouv === mdpNouv2) {
                                    $.ajax({
                                        url: 'modifPassword.php',
                                        method: 'post',
                                        data: { mdpNouv: mdpNouv, id: id },
                                        success: function (response) {
                                            Swal.fire('Mot de passe modifé', '', 'success');
                                            console.log(response);
                                        }
                                    });
                                }
                                else {
                                    Swal.fire('saisie incorrecte', '', 'failure');
                                }
                            }
                            else {
                                Swal.fire('Ancien mot de passe incorrect', '', 'failure');
                            }
                        }
                        else {
                            Swal.fire('Des champs requis sont vides', '', 'failure');
                        }
                    }
                })
            });
        </script>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            // Vérifiez si l'URL contient l'ancre #account-info
            if (window.location.hash === "#account-info") {
                // Activez l'onglet "Commandes"
                $('a[href="#account-info"]').tab('show');
            }
        });
        $(document).ready(function () {
            $('.view_commande').click(function (e) {
                e.preventDefault();
                // var commande_id = $('#commande_id').text();
                // console.log(commande_id);
            });
       

    })

        
    </script>
</body>

</html>