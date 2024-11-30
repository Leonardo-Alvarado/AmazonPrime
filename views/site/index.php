<?php
use yii\helpers\Html;
use app\models\Pelicula;
use yii\helpers\Url;

$this->title = 'Amazon Prime - Películas';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Html::encode($this->title) ?></title>

    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #141414; /* Fondo oscuro */
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            color: #fff;
        }

        /* Estilo para el encabezado (título grande de Amazon Prime) */
        .header {
            text-align: center;
            padding: 40px 20px; /* Reducido el padding del encabezado */
            margin-bottom: 10px; /* Reducido el margen inferior para acercar las tarjetas */
        }

        .header h1 {
            font-size: 4rem;
            font-weight: bold;
            color: #FF5733; /* Naranja cálido */
            text-transform: uppercase;
            letter-spacing: 5px;
            animation: glow 1.5s ease-in-out infinite, blink 1s ease-in-out infinite;
            text-shadow: 0 0 15px rgba(255, 87, 51, 1), 0 0 30px rgba(255, 87, 51, 0.8), 0 0 50px rgba(255, 87, 51, 0.6);
            margin: 0;
            display: inline-block;
            background: none; /* Eliminar fondo */
            padding: 0;
        }

        @keyframes blink {
            50% {
                opacity: 0.5;
            }
        }

        @keyframes glow {
            0% { text-shadow: 0 0 10px rgba(255, 87, 51, 1), 0 0 20px rgba(255, 87, 51, 0.6); }
            100% { text-shadow: 0 0 30px rgba(255, 87, 51, 1), 0 0 50px rgba(255, 87, 51, 0.8); }
        }

        /* Estilos de la tarjeta de película */
        .movie-card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;  /* Cambié esto para distribuir el espacio entre tarjetas */
            gap: 40px; /* Aumenté el espacio entre las tarjetas */
            padding: 0 20px;
            margin-top: 0px; /* Eliminado margen superior para acercar las tarjetas al título */
            margin-bottom: 30px; /* Reducido el margen inferior para reducir espacio debajo de las tarjetas */
        }

        .movie-card {
            background-color: #1e1e1e;
            border-radius: 8px;
            width: 230px; /* Ajuste al tamaño de las tarjetas */
            height: 550px; /* Ajuste al tamaño de las tarjetas */
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border 0.3s ease;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px; /* Aumentamos el margen inferior entre las tarjetas */
            border: 2px solid transparent; /* Borde invisible por defecto */
            box-shadow: 0 0 20px rgba(255, 87, 51, 1), 0 0 30px rgba(255, 87, 51, 0.8); /* Efecto de borde iluminado */
        }

        .movie-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.8);
            border: 2px solid rgba(255, 87, 51, 0.8); /* Añadir borde con resplandor al hacer hover */
        }

        .movie-card img {
            width: 100%;
            height: 280px; /* Tamaño más pequeño de las imágenes dentro de la tarjeta */
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .movie-card img:hover {
            transform: scale(1.05);
        }

        .movie-details {
            padding: 20px;
            text-align: center;
            flex-grow: 1;
            color: #bbb;
            width: 100%;
        }

        /* Título de la película dentro de la tarjeta con parpadeo y resplandor */
        .movie-title {
            font-size: 1.6rem;
            color: #FF5733;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: capitalize;
            animation: glow 1.5s ease-in-out infinite, blink 1s ease-in-out infinite; /* Añadimos animaciones de parpadeo y resplandor */
            text-shadow: 0 0 15px rgba(255, 87, 51, 1), 0 0 30px rgba(255, 87, 51, 0.8), 0 0 50px rgba(255, 87, 51, 0.6);
        }

        .movie-info {
            font-size: 1.1rem;
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 3.5rem;
            }

            .movie-card {
                width: 230px;
                height: 500px;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 3rem;
            }

            .movie-card {
                width: 180px;
                height: 450px;
            }

            .movie-title {
                font-size: 1.4rem;
            }

            .movie-info {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Título de la página -->
<div class="header">
    <h1>Amazon Prime</h1>
</div>

<!-- Contenedor de tarjetas de películas -->
<div class="movie-card-container">
    <?php
    $movies = Pelicula::find()->limit(20)->all(); // Limitar a 5 películas para mostrar
    foreach ($movies as $movie): ?>
        <div class="movie-card">
            <img src="<?= Yii::getAlias('@web/portadas/' . $movie->portada) ?>" alt="<?= Html::encode($movie->titulo) ?>">
            <div class="movie-details">
                <h3 class="movie-title"><?= Html::encode($movie->titulo) ?></h3>
                <p class="movie-info">Año: <?= Html::encode($movie->anio) ?></p>
                <p class="movie-info">Duración: <?= Html::encode($movie->duracion) ?> min</p>
                <p class="movie-info">Director: <?= Html::encode($movie->fkIddirector->nombre) ?></p>
                <p class="movie-info">Géneros: 
                    <?php 
                    $genres = $movie->fkIdcategorias;
                    foreach ($genres as $genre) {
                        echo Html::encode($genre->nombre) . ' ';
                    }
                    ?>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
