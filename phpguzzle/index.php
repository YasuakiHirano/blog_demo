<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

if ($_POST["mode"] == 'search') {
  $client = new Client();

  $url = 'http://zipcloud.ibsnet.co.jp/api/search';
  $option = [
    'headers' => [
      'Accept' => '*/*',
      'Content-Type' => 'application/x-www-form-urlencoded' 
    ],
    'form_params' => [
      'zipcode' => $_POST['zipcode']
    ]
  ];

  $response = $client->request('POST', $url, $option);

  $result = json_decode($response->getBody()->getContents(), true);
}
?>
<html>
	<head>
    <title>zip cloud test</title>
  </head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<body>
    <div class="container mt-3">
      <form action="index.php" method="post"> 
        <input type="hidden" name="mode" value="search" />
        <input type="text" value="" placeholder="郵便番号入力" class="form-control mb-3" name="zipcode" />
        <input type="submit" value="検索" class="btn btn-primary" />
      </form> 
      <div class="card rounded p-3">
        <?php 
          echo "<pre>";
          var_dump($result);
          echo "</pre>";
        ?>
      </div>
    </div>
	</body>
</html>

