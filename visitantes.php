<?php
  include('./conexao/conexao.php');
  $erro = false;

  if (count($_POST) > 0) {
    $nome       = $_POST['nome'];
    $opcao      = $_POST['opcao'];
    $telefone   = $_POST['telefone'];
    $informacao = $_POST['informacao'];

    if (empty($nome)) {
      $erro = "Preencha o campo nome.";
    }

    if (empty($opcao)) {
      $erro = "Preencha qual opção o visitante se encaixa.";
    }

    if (empty($telefone)) {
      $erro = "Preencha o campo telefone.";
    }

    if (empty($informacao)) {
      $erro = "Resposta inválida. Use Sim ou Não para responder.";
    }

    if ($erro) {
      echo "<div style='position: fixed; 
      top: 7px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #9b0909; 
      color: white; 
      padding: 15px 30px; 
      border-radius: 10px; 
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
      z-index: 1000; 
      font-size: 16px; 
      transition: opacity 0.5s ease; 
      opacity: 1; '> $erro </div>";
    } else {
      $sql_code = "INSERT INTO cadastro (nome, opcao, telefone, informacao) 
                VALUES ('$nome', '$opcao', '$telefone', '$informacao')";

      $sucesso = $mysqli->query($sql_code) or die($mysqli->error);
      if ($sucesso) {
        echo '<div class="sucesso">
        Visitante cadastrado com sucesso!
        </div>';
        unset($_POST);
      }
    }
  }
  ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">

  <title>Feira De Ciências - ETEC 2024</title>
</head>

<body>

  <div class="wrapper">
    <img src="./images/teia-aranha.png" class="teia-icone">


    <form method="POST" action="visitantes.php">
      <h1>Cadastro de Visitantes</h1>

      <div class="input-box">
        <label for="nome">Nome</label>
        <input type="text" style="accent-color: red;" placeholder="Nome" name="nome" required value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>">
        <img src="./images/abobora.png" class="abobora-icone">

      </div>
      <label for="Aluno">Quem é você: </label>
      <img src="./images/aranha.png" class="aranha-icone">

      <div class="form-check">
        <div class="form-group col-md-3">
          <input class="form-check-input" type="radio" name="opcao" value="aluno" style="accent-color: red;">
          <label class="form-check-label">Aluno</label>
        </div>
      </div>

      <div class="form-check">
        <div class="form-group col-md-3">
          <input class="form-check-input" type="radio" name="opcao" value="familiar" style="accent-color: red;">
          <label class="form-check-label">Familiar</label>
        </div>
      </div>

      <div class="form-check">
        <div class="form-group col-md-3">
          <input class="form-check-input" type="radio" name="opcao" value="visitante" style="accent-color: red;">
          <label class="form-check-label">Visitante</label>
        </div>
      </div>

      <div class="input-box">
        <label for="nome">Telefone</label>
        <input type="text" style="accent-color: red;" placeholder="(XX) XXXXX-XXXX" id="telefone" name="telefone" required value="<?php if (isset($_POST['telefone'])) echo $_POST['telefone']; ?>">
      </div>
      
      <label for="interesse">Você deseja receber informações via whatsapp sobre o Vestibulinho 2025?</label>
      <div class="form-row">
        <div class="form-check">
          <div class="form-group col-md-3">
            <input class="form-check-input" type="radio" name="informacao" value="sim" style="accent-color: red;">
            <label class="form-check-label">Sim</label>
          </div>
        </div>

        <div class="form-check">
          <div class="form-group col-md-3">
            <input class="form-check-input" type="radio" name="informacao" value="nao" style="accent-color: red;">
            <label class="form-check-label">Não</label>
          </div>
        </div>
      </div>

      <button type="submit" class="btn">
        Cadastrar
      </button>
      <img src="./images/teia-aranha.png" class="teia-inferior">

  </div>
  </div>




  </form>

  </div>

  <script>
    // Validar Telefone
    document.getElementById('telefone').addEventListener('input', function(e) {
      var value = e.target.value;
      var telefonePattern = value.replace(/\D/g, '')
        .replace(/(\d{2})(\d)/, '($1) $2')
        .replace(/(\d{5})(\d)/, '$1-$2')
        .replace(/(-\d{4})\d+?$/, '$1');
      e.target.value = telefonePattern;
    });
  </script>
</body>

</html>