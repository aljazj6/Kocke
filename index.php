<?php session_start(); ?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Začetek igre s kockami</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap" rel="stylesheet">
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Orbitron', sans-serif;
    background: url('Images/background.png')
    no-repeat center center fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    color: #f2d16b;
}

.form-container {
    background: rgba(0, 0, 0, 0.88);
    padding: 40px;
    border-radius: 20px;
    max-width: 800px;
    width: 90%;
    box-shadow: 0 0 20px #f2d16b;
    border: 1px solid #f2d16b;
}

h1 {
    text-align: center;
    color: #f2d16b;
    margin-bottom: 30px;
    text-shadow: 0 0 8px #f2d16b;
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

fieldset {
    border: 1px solid #f2d16b;
    border-radius: 12px;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.02);
}

legend {
    font-weight: bold;
    color: #f2d16b;
    padding: 0 10px;
}

label {
    display: block;
    margin-top: 10px;
    font-size: 0.95em;
    color: #f2d16b;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #f2d16b;
    background-color: rgba(255, 255, 255, 0.08);
    color: #f2d16b;
    margin-top: 5px;
}

input[type="submit"] {
    background-color: #f2d16b;
    color: #000;
    border: none;
    padding: 12px;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s ease;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #d5b43b;
}

    </style>
</head>
<body>
<div class="form-container">
    <h1>Vnesite igralce</h1>
    <form action="game.php" method="post">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <fieldset>
                <legend>Igralec <?= $i ?></legend>
                <label for="ime<?= $i ?>">Ime:</label>
                <input type="text" name="ime[]" id="ime<?= $i ?>" required>

                <label for="priimek<?= $i ?>">Priimek:</label>
                <input type="text" name="priimek[]" id="priimek<?= $i ?>" required>

                <label for="naslov<?= $i ?>">Naslov:</label>
                <input type="text" name="naslov[]" id="naslov<?= $i ?>" required>
            </fieldset>
        <?php endfor; ?>
        <input type="submit" value="Začni igro">
    </form>
</div>
</body>
</html>
