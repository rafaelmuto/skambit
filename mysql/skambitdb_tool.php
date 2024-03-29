<!DOCTYPE html>
<?php
    // XAMPP no macOSX:
    // exec("/Applications/XAMPP/xamppfiles/bin/mysqldump --opt --no-create-info --host=localhost --user=root --password= skambitdb > skambitdb_".date('Y-m-d-h-m-s').".sql");
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Skambitdb</title>
    <style media="screen">
      body {
        box-sizing: border-box;
        font-family: monospace;
        font-size: 10px;
      }

      table, th, td {
        border: 1px solid #bbb;
      }

      th, td {
        padding: 3px;
        text-align: center;
      }

      th {
        background-color: #555;
        color: white;
      }

      tr:nth-child(even) {
        background-color: #ccc;
      }

      tr:nth-child(odd) {
        background-color: #eee;
      }

      a {
        color: black;
      }

      h1 {
        margin: 0;
      }
    </style>
  </head>
  <body>
    <h1>Skambitdb/usuarios</h1>
    <?php
      include '../classes/cadastroUsuario.class.php';
      $usuarios = (new cadastroUsuario)->listar();
    ?>
    <table>
      <tr>
        <?php
          foreach ($usuarios[0] as $key => $value) {
            echo "<th>" . $key . "</th>";
          }
        ?>
      </tr>
      <?php
        foreach ($usuarios as $key => $item) {
          echo "<tr>";
          foreach ($item as $key => $value) {
            echo "<td>" . $value . "</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
    <br>
    <h1>Skambitdb/cad_produto</h1>
    <?php
      include "../classes/cadastroProduto.class.php";
      $produtos = (new cadastroProduto)->listar();
    ?>
    <table>
      <tr>
        <?php
          foreach ($produtos[0] as $key => $value) {
            echo "<th>" . $key . "</th>";
          }
        ?>
      </tr>
      <?php
        foreach ($produtos as $key => $item) {
          echo "<tr>";
          foreach ($item as $key => $value) {
            echo "<td>" . $value . "</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
    <br>
    <pre>
  </body>
</html>
