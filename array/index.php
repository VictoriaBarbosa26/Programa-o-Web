<!DOCTYPE html>
<html>
<head>
    <title>PHP com CSS</title>
	
    <style>
	@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

body {
		background-image:url(fundo.gif);
		background-repeat:no-repeat;
		background-size:100% 100%;
		background-attachment:fixed;
	}

text {
		color: white;
		text-align: center;
		font-size: 40px;
		position:absolute;
		top:5%;
		right: 43%;
		font-family: 'Press Start 2P', cursive;
    }
	
amarelo {
		color: yellow;
		text-align: center;
		font-size: 15px;
		position:absolute;
		top:60%;
		right:52%;
		font-family: 'Press Start 2P', cursive;
    }
	
vermelho {
		color: red;
		text-align: center;
		font-size: 15px;
		position:absolute;
		top:60%;
		right:62%;
		font-family: 'Press Start 2P', cursive;
    }

rosa {
		color: pink;
		text-align: center;
		font-size: 15px;
		position:absolute;
		top:60%;
		right:73%;
		font-family: 'Press Start 2P', cursive;
    }

azul {
		color: blue;
		text-align: center;
		font-size: 15px;
		position:absolute;
		top:60%;
		right:83%;
		font-family: 'Press Start 2P', cursive;
    }

laranja {
		color: orange;
		text-align: center;
		font-size: 15px;
		position:absolute;
		top:60%;
		right:91%;
		font-family: 'Press Start 2P', cursive;
    }

	
    </style>

</head>
<body>
    <?php
	echo "<text><marquee>PAC-MAN</marquee></text>";
	echo "<laranja>Laranja</laranja>";
	echo "<azul>Azul</azul>";
	echo "<rosa>Rosa</rosa>";
	echo "<vermelho>Vermelho</vermelho>";
	echo "<amarelo>Amarelo</amarelo>";
    ?>
</body>
</html>