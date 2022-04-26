<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

Index template<br>
<?= $this->theme->header('',['vartest'=>'string'])?><br>
<?= $this->theme->sidebar('',['vartest'=>'varbar'])?><br>
<?= $this->theme->block('block1')?><br>
<?= $this->theme->block('block2')?><br>
<?= $this->theme->footer('red-black')?><br>
<?=$name?><br>
<?=$status?>

	
</body>
</html>