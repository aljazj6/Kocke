<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['users'] = [];
    for ($i = 0; $i < 3; $i++) {
        $_SESSION['users'][] = [
            'ime' => $_POST['ime'][$i],
            'priimek' => $_POST['priimek'][$i],
            'naslov' => $_POST['naslov'][$i]
        ];
    }
}

function izrisi_kocko($vrednost) {
    return "<img src='Images/dice{$vrednost}.gif' alt='kocka {$vrednost}' class='dice'>";
}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Moderna igra s kockami</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Orbitron', sans-serif;
    background: url('Images/background.png') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    color: #f2d16b;
}

.game-container {
    background: rgba(0, 0, 0, 0.88);
    padding: 40px;
    border-radius: 20px;
    max-width: 900px;
    width: 90%;
    box-shadow: 0 0 20px #f2d16b;
    text-align: center;
    border: 1px solid #f2d16b;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 20px;
    color: #f2d16b;
    text-shadow: 0 0 10px #f2d16b;
}

.player {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    margin: 20px 0;
    border-radius: 12px;
    border: 1px solid #f2d16b;
    transition: transform 0.3s;
}

.player:hover {
    transform: scale(1.03);
}

.dice-row {
    margin: 15px 0;
}

.dice {
    width: 60px;
    margin: 0 5px;
    filter: drop-shadow(0 0 5px #f2d16b);
    animation: shake 0.6s ease;
}

@keyframes shake {
    0% { transform: rotate(0deg); }
    25% { transform: rotate(15deg); }
    50% { transform: rotate(-15deg); }
    75% { transform: rotate(10deg); }
    100% { transform: rotate(0deg); }
}

.winner {
    background: #f2d16b;
    color: #000;
    padding: 15px;
    font-size: 1.3em;
    font-weight: bold;
    border-radius: 12px;
    margin-top: 30px;
    border: 1px solid #f2d16b;
}

.redirect {
    margin-top: 15px;
    font-size: 0.9em;
    opacity: 0.8;
}

    </style>
</head>
<body>
<div class="game-container">
    <h1>Rezultati igre s kockami</h1>

    <?php
    $rezultati = [];

    foreach ($_SESSION['users'] as $index => $user) {
        $kocke = [rand(1, 6), rand(1, 6), rand(1, 6)];
        $vsota = array_sum($kocke);
        $rezultati[$index] = $vsota;

        echo "<div class='player'>";
        echo "<h3>{$user['ime']} {$user['priimek']}</h3>";
        echo "<p>{$user['naslov']}</p>";
        echo "<div class='dice-row'>";
        foreach ($kocke as $vrednost) {
            echo izrisi_kocko($vrednost);
        }
        echo "</div>";
        echo "<p>Skupna vsota: <strong>$vsota</strong></p>";
        echo "</div>";
    }

    $najvisja_vsota = max($rezultati);
    $zmagovalci = [];

    foreach ($rezultati as $i => $vsota) {
        if ($vsota === $najvisja_vsota) {
            $zmagovalci[] = $_SESSION['users'][$i]['ime'] . " " . $_SESSION['users'][$i]['priimek'];
        }
    }

    echo "<div class='winner'>🏆 Zmagovalec/i: " . implode(', ', $zmagovalci) . "</div>";
    ?>
    <p class="redirect">🔄 Preusmeritev nazaj čez 10 sekund...</p>
</div>

<script>
    setTimeout(() => {
        window.location.href = "index.php";
    }, 10000);
</script>
</body>
</html>
