<!DOCTYPE html>
<html>
<head>
	<title>Info Gudang</title>
</head>
<body>
<form action="postImport" method="post" enctype="multipart/form-data">
	<input type="token" name="_token" value="{{csrf_token()}}">
	<input type="file" name="gudang">
	<input type="submit" value="Import"></input>
</form>
</body>
</html>