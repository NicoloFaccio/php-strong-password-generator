<?php
  $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numbers = '0123456789';
  $symbols = '!?&%$<>^+-*/()[]{}@#_=';

  if (isset($_GET['password'])) {
    $lunghezzaPassword= $_GET['password'];
    $AgreedDuplication= $_GET['duplicationNumber'];

    echo createdPassword($lunghezzaPassword, $letters, $numbers, $symbols, $AgreedDuplication);
  };

  function createdPassword($lunghezzaPassword, $letters, $numbers, $symbols, $AgreedDuplication) {
    $newPassword= '';
    $AllSymobols = $letters . $numbers . $symbols;

    while(strlen($newPassword) < $lunghezzaPassword ) {
        $indexLetters = rand(0, strlen($AllSymobols) - 1);

        if($AgreedDuplication == true || !str_contains($newPassword, $AllSymobols[$indexLetters])){
            $newPassword .= $AllSymobols[$indexLetters]; 
        };
    }

    return $newPassword;
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator password</title>
    <!-- BOOTSTRAP'S LINK -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 class="text-center">Generatore di password</h1>
    </header>

    <main>
        <form action="index.php" method="get">
            <div class="row">
                <div class="col-2">
                    <label for="password" class="form-label">Lunghezza password</label>
                    <input type="number" id="password" name="password" class="form-control my-2">
                </div>

                <div class='col-4'>
                    <span>Consenti caratteri duplicati</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="duplicationNumber" id="duplicationNumber" value='1'>
                        <label class="form-check-label" for="duplicationNumber">
                           Si
                        </label>
                    </div>
            
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="duplicationNumber" id="duplicationNumber" value='0'>
                      <label class="form-check-label" for="duplicationNumber">
                        No
                      </label>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Invia</button>
        </form>

    </main>

    <!-- BOOTSTRAP'S JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>