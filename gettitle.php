<?php
   require_once 'config.php'; // підключаємо скрипт
      //Проводимо спробу підключення к серверу MySQL
      $link = mysqli_connect($host, $user, $password, $database)
         or die("Помилка " . mysqli_error($link));

   if (isset($_GET['q']) && $_GET['q']) {
      $q = $_GET["q"];
      $query  = "SELECT link FROM url WHERE id_url = ".$q.";";
      $result = mysqli_query($link, $query);
      while ($row = mysqli_fetch_array($result)) {
         $url = $row[0];
      }
      $xmlDoc = new DOMDocument();

       require __DIR__ . "/phpQuery-onefile.php";

       $file = file_get_contents($url);

       $pq = phpQuery::newDocument($file);

       $title = $pq->find('title')->html();

     echo $title;
   } else {
      echo "error";
   }
?>