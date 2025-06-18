<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Calculadora_extens;

$calculadora = new Calculadora_extens();
$resultado = null;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $operacion = $_POST['operacion'] ?? '';
    $a = isset($_POST['a']) ? floatval($_POST['a']) : 0;
    $b = isset($_POST['b']) ? floatval($_POST['b']) : 0;

    try {
        switch ($operacion) {
            case 'suma':
                $resultado = $calculadora->suma($a, $b);
                break;
            case 'resta':
                $resultado = $calculadora->resta($a, $b);
                break;
            case 'multiplicacion':
                $resultado = $calculadora->multiplicacion($a, $b);
                break;
            case 'division':
                $resultado = $calculadora->division($a, $b);
                break;
            default:
                $error = 'Operación no válida';
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <title>Calculadora PHP</title>
 <style>
    body { 
      font-family: Arial, sans-serif; 
      display: flex; 
      justify-content: center; 
      align-items: center;
      height: 100vh; 
      background-color: #f0f0f0; 
      margin: 0; 
    }
    .container {
      text-align: center; 
      background-color: #fff; 
      padding: 20px; 
      border-radius: 8px; 
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 320px;
    }
    input[type=number], select {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      box-sizing: border-box;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: #fff;
      width: 100%;
    }
    p {
      font-size: 18px; 
      margin-top: 20px;
      word-wrap: break-word;
    }
    p.error {
      color: red;
    }
 </style>
</head>
<body>
 <div class="container">
   <h1>Calculadora PHP</h1>
   <form method="post">
     <input type="number" step="any" name="a" placeholder="Número A" required value="<?= isset($_POST['a']) ? htmlspecialchars($_POST['a']) : '' ?>" />
     <input type="number" step="any" name="b" placeholder="Número B" required value="<?= isset($_POST['b']) ? htmlspecialchars($_POST['b']) : '' ?>" />
     <select name="operacion" required>
       <option value="suma" <?= (isset($_POST['operacion']) && $_POST['operacion'] === 'suma') ? 'selected' : '' ?>>Suma</option>
       <option value="resta" <?= (isset($_POST['operacion']) && $_POST['operacion'] === 'resta') ? 'selected' : '' ?>>Resta</option>
       <option value="multiplicacion" <?= (isset($_POST['operacion']) && $_POST['operacion'] === 'multiplicacion') ? 'selected' : '' ?>>Multiplicación</option>
       <option value="division" <?= (isset($_POST['operacion']) && $_POST['operacion'] === 'division') ? 'selected' : '' ?>>División</option>
     </select>
     <button type="submit">Calcular</button>
   </form>
   <?php if ($resultado !== null): ?>
     <p><strong>Resultado:</strong> <?= htmlspecialchars($resultado) ?></p>
   <?php elseif ($error): ?>
     <p class="error"><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>
   <?php endif; ?>
 </div>
</body>
</html>
