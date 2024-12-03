<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }

    .profile {
      max-width: 1000px;
      margin: 20px auto;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-wrap: wrap;
      overflow: hidden;
      border-radius: 10px;
    }

    .left-section {
      flex: 1;
      background-color: #3498db; /* Azul */
      color: white;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
    }

    .profile-photo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      background-image: url('https://via.placeholder.com/150');
      background-size: cover;
      border: 3px solid #2980b9; /* Azul mais claro */
      background-position: center;
    }

    .name {
      font-size: 1.8em;
      margin-bottom: 10px;
      font-weight: bold;
    }

    .edit-profile-button {
      background-color: #2980b9; /* Azul mais claro */
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .edit-profile-button:hover {
      background-color: #3498db; /* Azul */
    }

    .right-section {
      flex: 2;
      padding: 40px;
      border-left: 1px solid #ddd;
      display: flex;
      flex-direction: column;
    }

    h2 {
      color: #3498db; /* Azul */
      font-size: 1.6em;
      margin-bottom: 20px;
    }

    .info {
      margin-bottom: 30px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
      color: #3498db;
    }

    p {
      margin: 5px 0;
      color: #555; /* Cinza para informações */
    }

    .actions {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      margin-top: 20px;
      gap: 15px;
    }

    .action-button, .action-button1 {
      background-color: #3498db; /* Azul */
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .action-button1 {
      background-color: #FFFFFF;
      color: #3498db;
      border: 2px solid #3498db;
    }

    .action-button:hover, .action-button1:hover {
      background-color: #2980b9; /* Azul mais claro */
    }

    .action-button1:hover {
      background-color: #3498db;
      color: white;
    }

    /* Responsividade */
    @media (max-width: 768px) {
      .profile {
        flex-direction: column;
        align-items: center;
      }
      .left-section, .right-section {
        width: 100%;
        padding: 20px;
      }
    }

  </style>
</head>
<body>

  <div class="profile">
    <div class="left-section">
      <!-- Foto do perfil -->
      <div class="profile-photo" id="profilePhoto"></div>
      <div class="name" id="userName">Nome do Cliente</div>
      <div>
        <button class="edit-profile-button" onclick="changeProfilePicture()">Alterar Foto</button>
      </div>
    </div>

    <div class="right-section">
      <h2>Informações do Perfil</h2>

      <h1>Bem-vinde</h1>
      <div class="info">
        <label>Nome:</label>
        <p id="userName2">(XX) XXXX-XXXX</p>
      </div>
      <div class="info">
        <label>E-mail:</label>
        <p id="userEmail">exemplo@email.com</p>
      </div>
      
   
       
      
      <div class="actions">
        <button class="action-button">
          <a href="<?= url("/app/alteracaoperfil") ?>">Alterar Dados</a>
        </button>
        <button class="action-button">
          <a href="<?= url("/app/upload") ?>">Upload Foto</a>
        </button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
        const user = JSON.parse(localStorage.getItem("userAuth"));

        if (user) {
            document.getElementById("userName").textContent = user.name;
            document.getElementById("userEmail").textContent = user.email;
            document.getElementById("userName2").textContent = user.name;
           
        } else {
            window.location.href = "<?= url('login'); ?>";
        }
    });

    

    function logout() {
        localStorage.removeItem("userAuth");
    }
  </script>

</body>
</html>
