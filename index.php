<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 

   <style>
       

body {
    background-color:floralwhite;
    background-image: url('images/Allura - Freelancing (4).png');
    background-repeat: no-repeat; 
    height: 100vh; 
}

p{
    color:orangered; 
    font-size: 14px;

}

.typewriter  {
            overflow: hidden; 
            border-right: .15em solid #FF0000; 
            white-space: nowrap; 
            margin: 0 auto; 
            letter-spacing: .15em; 
            background-position: top-left;
            animation: typing 3.5s steps(30, end), blink-caret .75s step-end infinite; 
        }


        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: transparent; }
        }


.login-container {
    background-color:white; 
    color:#FF0000;
    width: 100%;
    max-width: 350px;
     max-height: 400px;
    padding: 0px; 
    box-shadow: 10 10px 40px rgba(255, 255, 254, 1); 
    transition: opacity 5s ease, transform 3s ease;
    opacity: 1; 
    top: 0px;
    margin-left: 100px;
    transform: translateX(80px);
    
}

 .btn-primary {
            background-color: #FF0000; 
            border: none;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            width: 150px;
            border-radius: 20px;
        }

        h2{
             color: #FF0000;
            
        }

.fade-in {
    opacity: 2;
    transform: translateX(0);
}
.custom-line {
    border: none; 
    height: 2px; 
    background-color: darkblue; 
    width: 40%; 
}

.animated-banner {
            opacity:0;
            animation: slideInZoom 2s ease forwards;
        }

        @keyframes slideInZoom {
            0% {
                transform: translateY(-50px) scale(0.5);
                opacity: 0;
            }
            50% {
                transform: translateY(10px) scale(1.1);
                opacity: 0.9;
            }
            70% {
                transform: translateY(-5px) scale(1);
            }
            100% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }
@media (max-width: 768px) {
    body {
        background-size:300px; /* Contient l'image sans la rogner */
        margin-bottom: 0px;
        background-position:top; /* Centre l'image verticalement et horizontalement */
    }

     h2{ 
            color:transparent;
        }
     
     .typewriter  {
            border-right: transparent; 
            animation: typing 3.5s steps(30, end), blink-caret .75s step-end infinite; 
        }

        .form-control {
            font-size: 0.9rem; /* Réduit légèrement la taille de la police pour les petits écrans */
        }
        .container-fluid {
                justify-content: center center;
                padding-top: 0px;
            }
            
            .login-container {
                
                  transform: translateX(80px);
            }
             .container-fluid {
                justify-content: center;
                padding-top: 10px;
            }
            
            .login-container {
                margin: 0 auto;
                transform: translateX(0);
            }
        }

        ::placeholder {
            color: #999;
            opacity: 1;
        }
}

   </style>

</head>
<body>
    <div id="welcome-banner" class="text-center p-12 fixed-top " >
      <h2  class="typewriter">  My App CJM </h2> 
    </div>


    <div class="container-fluid d-flex justify-content-end align-items-center min-vh-100" style="padding-top: 100px;">
        <div class="login-container shadow-lg p-5 rounded">
            <form>
                <div class="form-group">
                    <h5 class="text-center text- mb-4">Bonjour ! Démarrons. <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
  <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362s.96-1.932.362-2.531c-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532"/>
  <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9 9 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a10 10 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093q.1.026.16.045c.184.06.279.13.351.295l.029.073a3.5 3.5 0 0 1 .157.721c.055.485.051 1.178-.159 2.065m-4.828 7.475.04-.04-.107 1.081a1.54 1.54 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a9 9 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006M5.205 5c-.625.626-.94 1.351-1.004 2.09a9 9 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a3 3 0 0 0-.045-.283 3 3 0 0 0-.3-.041Z"/>
  <path d="M7.009 12.139a7.6 7.6 0 0 1-1.804-1.352A7.6 7.6 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z"/>
</svg></h5>
                    <hr class="custom-line">
                   <center><p class="typewriter" style="opacity:0.5">Connectez-vous. <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc-display-horizontal" viewBox="0 0 16 16">
  <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5M12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0m2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0M1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25"/>
</svg></p></center> 
                    <br>
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
                    <button type="submit" class="btn btn-primary btn-block mt-4" >
                        CONNEXION
                    </button>
                </center>
            </form>
        </div>
    </div>

   
        

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.querySelector('.login-container');
            container.classList.add('fade-in');
        });
    </script>
     <footer style="background-color:lavenderblush;">
        
            <p align="center" style="color:black;">Droits d'auteur © 2024. <span style="color:red;">C J M </span>Tous droits réservés. </p>
        
    </footer>
</body>
</html>
