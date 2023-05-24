<?php
   require_once 'config.php';
   $link = mysqli_connect($host, $user, $password, $database)
      or die("Помилка " . mysqli_error($link));

?>
<html>
   <head>
      <title>Адміністратор</title>
      <meta charset = "utf-8">
      <link rel = "stylesheet" href = "style.css" type = "text/css">
      <script>
         function showCD(str) {
            if (str == "") {
               document.getElementById("txtHint").innerHTML = "";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {  
               // code for IE6, IE5
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
               //if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  //document.getElementById("link").innerHTML = str;
                  document.getElementById("status").innerHTML = xmlhttp.statusText;
                  document.getElementById("title").innerHTML = xmlhttp.responseText;
              //}
            }
            xmlhttp.open("POST","gettitle.php?q="+str,true);
            xmlhttp.send();
         }
      </script>
   
   </head>
   <body>
      <header>
         <div class = 'quit'>
            <a href = 'index.php'>Вихід</a>
         </div>
      </header>
      
      <form class = 'parser'>
               <?php
                  $query  = "SELECT id_url, link FROM url";
                  $result = mysqli_query($link, $query);

                  echo "<select name = 'cds' onchange = 'showCD(this.value)'>";
                     echo "<option value='0'>оберіть link</option>";
                        while ($row = mysqli_fetch_array($result)) {
                           echo "<option value = ".$row[0]."> ".$row[1]." </option>";
                        }
                  echo "</select>";
               ?>
      </form>
      
      <div id = "txtHint"></div>
      <table>
         <tr>

            <th>Статус</th>
            <th>Заголовок</th>
         </tr>
         <tr>

            <td id = 'status'></td>
            <td id = 'title'></td>
         </tr>
      </table>
   </body>
</html>