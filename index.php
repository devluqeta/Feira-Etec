<?php
// Conectando ao banco de dados... Porque sem conexão, não há festa!
include('./Connection/Connection.php');

// Inicializando a variável erro. Por enquanto está na paz, mas quem sabe ela apareça.
$erro = false;

// O formulário foi enviado? Se sim, bora processar tudo.
if (count($_POST) > 0) {
  $nome       = $_POST['nome']; // "Nome" – não pode faltar!
  $opcao      = $_POST['opcao']; // Quem você é? Aluno, Familiar ou Visitante?
  $telefone   = $_POST['telefone']; // O famoso número que não pode sumir.
  $informacao = $_POST['informacao']; // A tão esperada resposta: Sim ou Não!

  // E se o nome estiver vazio... Não dá para cadastrar sem saber com quem estamos falando.
  if (empty($nome)) {
    $erro = "Preencha o campo nome.";
  }

  // E não vale ser indeciso, escolha sua opção! 
  if (empty($opcao)) {
    $erro = "Preencha qual opção o visitante se encaixa.";
  }

  // Cadê o telefone? Aquele número mágico que todos querem ter.
  if (empty($telefone)) {
    $erro = "Preencha o campo telefone.";
  }

  // Resposta inválida! "Sim" ou "Não", escolha com sabedoria.
  if (empty($informacao)) {
    $erro = "Resposta inválida. Use Sim ou Não para responder.";
  }

  // Aqui o erro aparece se algo deu errado, e a mensagem fica super visível!
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
    // Se deu tudo certo, bora cadastrar! O banco de dados está esperando.
    $sql_code = "INSERT INTO cadastro (nome, opcao, telefone, informacao) 
                VALUES ('$nome', '$opcao', '$telefone', '$informacao')";

    // Enviando os dados para o banco! Que venham os visitantes!
    $sucesso = $mysqli->query($sql_code) or die($mysqli->error);
    if ($sucesso) {
      // Agora é hora de mostrar que deu tudo certo. Registro feito com sucesso!
      echo '<div class="sucesso">
        Visitante cadastrado com sucesso! 🎉
        </div>';
      unset($_POST); // Limpando o formulário para o próximo!
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
  <link rel="stylesheet" href="./public/css/style.css">

  <title>Feira De Ciências - ETEC 2024</title>
</head>

<body>

  <!-- Ah, a teia de aranha! Não se preocupe, não estamos criando aranhas, só estamos decorando. -->
  <div class="wrapper">
    <img src="./public/images/teia-aranha.png" class="teia-icone">

    <!-- Formulário de cadastro: onde tudo começa e todo visitante tem sua chance de brilhar. -->
    <form method="POST" action="visitantes.php">
      <h1>Cadastro de Visitantes</h1>

      <div class="input-box">
        <label for="nome">Nome</label>
        <!-- Aqui vai o nome de todo visitante! Não deixe em branco, por favor. -->
        <input type="text" style="accent-color: red;" placeholder="Nome" name="nome" required value="<?php if (isset($_POST['nome'])) echo $_POST['nome']; ?>">
        <img src="./public/images/abobora.png" class="abobora-icone">
      </div>

      <label for="Aluno">Quem é você? Escolha a sua opção! </label>
      <img src="./public/images/aranha.png" class="aranha-icone">

      <!-- Escolha entre aluno, familiar ou visitante. Não vale deixar para amanhã! -->
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
        <!-- O famoso campo de telefone. Se não tiver, o contato fica difícil, né? -->
        <input type="text" style="accent-color: red;" placeholder="(XX) XXXXX-XXXX" id="telefone" name="telefone" required value="<?php if (isset($_POST['telefone'])) echo $_POST['telefone']; ?>">
      </div>

      <label for="interesse">Você deseja receber informações via WhatsApp sobre o Vestibulinho 2025?</label>
      <div class="form-row">
        <!-- E aqui vai o "Sim" ou "Não"... A grande decisão do formulário! -->
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

      <p class="criado-por">
        Criado por: Lorena e Lucas 3º DS
      </p>

      <!-- Imagem do lado de baixo... Mais teia de aranha para dar o toque final. -->
      <img src="./public/images/teia-aranha.png" class="teia-inferior">
    </form>
  </div>



  <!-- Mascarando o telefone, porque um telefone bonito é tudo! -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#telefone').mask('(00) 00000-0000');
    });
  </script>

</body>

</html>