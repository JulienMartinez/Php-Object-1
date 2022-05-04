<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $title_tag ?></title>

    <link rel="stylesheet" href="/assets/CSS/reset.css">
    <link rel="stylesheet" href="/assets/CSS/style.css">

</head>
<body>
	<header>
		<h1>Airbnb Azeroth</h1><br>
		<nav>



            <?php if(!empty($_SESSION['USER'])): ?>
                <a href="/chambres">Les chambres</a>
                <a href="/reservations">Réservations</a>
            <?php endif; ?>
                <?php if(!empty($_SESSION['USER']) && $_SESSION['USER']->user_type === 2): ?>
                    <a href="/creer_chambre">Créer une location</a>
                <?php endif; ?>
            <?php if(!empty($_SESSION['USER'])): ?>
            <a href="/disconnect">Déconnection</a>
            <?php endif; ?>
		</nav>
	</header>

	<main>

