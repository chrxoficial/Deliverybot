<!DOCTYPE html>
<html>
  <head>
    <title>Formulário</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
      }
      
      form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        max-width: 500px;
        margin: 0 auto;
      }
      
      table {
        width: 100%;
      }
      
      th,
      td {
        padding: 10px;
        text-align: left;
      }
      
      th {
        background-color: #eee;
      }
      
      input[type="text"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
        margin-top: 5px;
      }
      
      input[type="submit"] {
        padding: 10px;
        background-color: #4CAF50;
        border: none;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
      }
      
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  
  <body>
    <form id="form1" name="form1" method="post" action="">
      <table>
        <tr>
          <th>Produtos</th>
          <th>Valores</th>
        </tr>
        <tr>
          <td>Botijão Gás</td>
          <td>
            <input type="text" name="textfield" id="textfield" />
          </td>
        </tr>
        <tr>
          <td>Galão de Água</td>
          <td>
            <input type="text" name="textfield2" id="textfield2" />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="button" id="button" value="Salvar" />
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
