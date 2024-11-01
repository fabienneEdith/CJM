<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <div id="welcome-banner" class="text-center p-3  fixed-top " >
      <h2  class="typewriter">  My App CJM </h2> 

    </div>

    <!-- Conteneur principal -->
    <div class="container-fluid d-flex justify-content-end align-items-center min-vh-100" style="padding-top: 80px;">
        <div class="login-container shadow-lg p-5 rounded">
            <form>
                <div class="form-group">
                    <h5 class="text-center text- mb-4">Bonjour ! Commençons.</h5>
                    <hr class="custom-line">
                    <p class="text-center text-" style="color:orangered; font-size: 14px;">Connectez-vous pour continuer.</p>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" id="matricule" placeholder="Entrez votre matricule">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                        </div>
                        <select class="form-control" id="role">
                            <option>Administrateur</option>
                            <option>Professeur</option>
                            <option>Élève</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe">
                    </div>
                </div>

                <center>
                    <button type="submit" class="btn btn-primary btn-block mt-4" style="border-radius: 10px; width: 150px;">
                        CONNEXION
                    </button>
                </center>
            </form>
        </div>
    </div>

   
        

    <script>
        // Animation JavaScript pour l'apparition du conteneur de connexion
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector('.login-container');
            container.classList.add('fade-in');
        });
    </script>
</body>
</html>
