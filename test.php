<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
    session_start();
    include_once 'Wasmachine.php'; //Wasmachine class invoegen in de test
    include_once 'Magnetron.php'; //Magnetron class invoegen in de test

    $Wasmachine1 = new Wasmachine(); //nieuwe instantie van wasmachine aanmaken
    $Magnetron1 = new Magnetron(); //nieuwe instantie van magnetron aanmaken

    if(isset($_POST['IsWasmachineWork'])){  //Controleer of we de knopje "on" wasmachine van is gedrukt
        if($_POST['IsWasmachineWork'] == "true"){
            $_SESSION["WasmachineWork"] = 1;
        }
        if($_POST['IsWasmachineWork'] == "false"){ //Controleer of we de knopje "off" wasmachine van is gedrukt
            $_SESSION["WasmachineWork"] = null;
        }
    }
    if(isset($_POST['IsMagnetronWork'])){  //Controleer of we de knopje "on" magnetron van is gedrukt
        if($_POST['IsMagnetronWork'] == "true"){
            $_SESSION["MagnetronWork"] = 1;
        }
        if($_POST['IsMagnetronWork'] == "false"){  //Controleer of we de knopje "off" magnetron van is gedrukt
            $_SESSION["MagnetronWork"] = null;
        }
    }


    if(isset($_SESSION["WasmachineWork"])){ //Controleer of wasmachine aan is
        $Wasmachine1->on();
    }
    if(isset($_SESSION["MagnetronWork"])){ //Controleer of magnetron aan is
        $Magnetron1->on();
    }

    if(isset($_POST['kleding']) && isset($_POST['zeep'])){
        $Wasmachine1->Wassen($_POST['kleding'],$_POST['zeep']);
    }
    echo "<br>";
    if(isset($_POST['voeding']) && (isset($_POST['tijd'])&& !empty($_POST['tijd'])) && isset($_POST['Wattege'])){
        $Magnetron1->opwarmen($_POST['voeding'],$_POST['tijd'], $_POST['Wattege']);
    }
    
?>
    <div class="container mt-5 pt-5">
        <img class="w-25" src="./img/Wasmachine.png" alt="cleaner">

        <form action="test.php" method="post">
            <input type="hidden" name="IsWasmachineWork" value="true">
            <input type="submit"  class="btn btn-success" value="on">
        </form>
        

        <form action="test.php" method="post">
            <input type="hidden" name="IsWasmachineWork" value="false">
            <input type="submit" class="btn btn-danger"value="off">
        </form>

        <?php
        if(isset($_SESSION["WasmachineWork"])){
            echo"
            <form action='test.php' method='post'>
            <input type='text' class='form-control' placeholder='Clothes' name='kleding'>
            <input type='text' class='form-control' placeholder='Bleach' name='zeep'>
            <input type='submit' class='btn btn-warning' value='Start'>
            </form>
            ";
        }
        ?>

        <img class="w-25" src="./img/Magnetron.png" alt="cleaner">

        <form action="test.php" method="post">
            <input type="hidden" name="IsMagnetronWork" value="true">
            <input type="submit"  class="btn btn-success" value="on">
        </form>

        <form action="test.php" method="post">
            <input type="hidden" name="IsMagnetronWork" value="false">
            <input type="submit" class="btn btn-danger"value="off">
        </form>

        <?php
        if(isset($_SESSION["MagnetronWork"])){
            echo"
            <form action='test.php' method='post'>
            <input type='text' class='form-control' placeholder='Food' name='voeding'>
            <input type='number' class='form-control' placeholder='Time(seconds)' name='tijd'>
            <select class='form-select' aria-label='Default select example' name='Wattege'>
                <option selected>Wattege</option>
                <option value='500W'>500W</option>
                <option value='750W'>750W</option>
                <option value='1000W'>1000W</option>
            </select>
            <input type='submit' class='btn btn-warning' value='Start'>
            </form>
            ";
        }
        ?>

    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>