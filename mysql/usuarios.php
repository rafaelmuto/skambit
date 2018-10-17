<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Skambitdb: usuarios</title>
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
    </style>
  </head>
  <body>
    <h1>Skambitdb/usuarios</h1>
    <?php
      include '../classes/cadastroUsuario.class.php';
      $array = (new cadastroUsuario)->listar();
    ?>
    <hr>
    <table>
      <tr>
        <?php
          foreach ($array[0] as $key => $value) {
            echo "<th>" . $key . "</th>";
          }
        ?>
      </tr>
      <?php
        foreach ($array as $key => $item) {
          echo "<tr>";
          foreach ($item as $key => $value) {
            echo "<td>" . $value . "</td>";
          }
          echo "</tr>";
        }
      ?>
    </table>
    <!-- <?php var_dump((new cadastroUsuario)->getNomes("sdfa")); ?> -->
  </body>
</html>
