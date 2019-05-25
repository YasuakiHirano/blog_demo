<?php
	$mode = $_POST["mode"];

  // ヘッダ行
	$head = ['id', '名前', '説明', '価格'];

  // データ行
	$data = [
						["00001", 'りんご', '12個です', '1,200'],
						["00002", 'ぶどう', 'ひとつぶです', '10,200'],
						["00003", 'なし', '1個です', '120']
					];

	// 出力モードの場合
	if ($mode == "output") {
		$date = date("Ymd");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=商品リスト_{$date}.csv");

		// ヘッダ行の文字コード変換
		foreach ($head as $key => $value) {
			$head[$key] = mb_convert_encoding($value, "SJIS", "UTF-8");
		}

		// データ行の文字コード変換・加工
		foreach ($data as $data_key => $line) {
			foreach ($line as $line_key => $value) {
					// 0をエクセルで表示させたい
					if ($line_key == 0) {
						$value = '="' . $value . '"';	
					}

					// , があったらダブルクォーテーションで囲む
					if (strpos($value, ',')) {
						$data[$data_key][$line_key] = mb_convert_encoding('"' . $value . '"', "SJIS", "UTF-8");	
					} else {
						$data[$data_key][$line_key] = mb_convert_encoding($value, "SJIS", "UTF-8");	
					}
			}
		}
		echo implode($head, ",") . "\r\n";

		foreach ($data as $key => $line) {
			echo implode($line, ",") . "\r\n";
		}
		exit;
	}
?>
<html lang="ja">
	<head>
		<title>くだもの一覧</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<form action="./index.php" method="POST">
			<div class="container">
				<table class="table table-hover table-striped mt-5">
				<tr>
					<?php
						foreach ($head as $value) {
							echo "<th>" . $value . "</th>";
						}
					?>
				</tr>
				<?php
					foreach ($data as $line) {
						echo "<tr>";
						foreach ($line as $value) {
							echo "<td>" . $value . "</td>";
						}
						echo "</tr>";
					}
				?>
				</table>
				<input type="hidden" name="mode" value="output" />
				<input type="submit" value="出力" class="btn btn-primary pl-3 pr-3" />
			</div>
		</form>
	</body>
</html>
