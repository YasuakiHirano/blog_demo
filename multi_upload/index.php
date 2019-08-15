<html lang="ja">
	<head>
		<title>multi upload test</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script>
		$(function(){
			// ドラッグしたままエリアに乗った＆外れたとき
			$(document).on('dragover', '#file_drag_drop_area, #file_drag_drop_area_stl', function (event) {
					event.preventDefault();
					$(this).css("background-color", "#999999");
			});
			$(document).on('dragleave', '#file_drag_drop_area, #file_drag_drop_area_stl', function (event) {
					event.preventDefault();
					$(this).css("background-color", "transparent");
			});

			// ドラッグした時
			$(document).on('drop', '#file_drag_drop_area', function (event) {
					let org_e = event;
					if (event.originalEvent) {
							org_e = event.originalEvent;
					}

					org_e.preventDefault();
					file_input.files = org_e.dataTransfer.files;
					$(this).css("background-color", "transparent");
			});
		});
		</script>
	</head>
	<body>
		<div class="mt-3">
			<form id="file_upload_form" method="post" enctype="multipart/form-data" action="upload.php">
				<div id="file_drag_drop_area" class="text-center p-3 rounded col-md-10 mx-auto" style="border:3px #000000 dashed;">
					ここにファイルをドラッグ&ドロップ<br/>
					<span>または</span><br/>
					<input id="file_input" type="file" name="file[]" multiple />
				</div>
				<div class="d-flex justify-content-center mt-2">
					<input type="submit" value="送信" class="btn btn-primary pl-3 pr-3" />
				</div>
			</form>
		</div>
	</body>
</html>
