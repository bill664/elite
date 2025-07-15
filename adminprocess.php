
<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $team_home = $_POST['team_home'];
    $team_away = $_POST['team_away'];
    $prediction = $_POST['prediction'];
    $odds_home = $_POST['odds_home'];
    $odds_draw = $_POST['odds_draw'];
    $odds_away = $_POST['odds_away'];
    $form_home = $_POST['form_home'];
    $form_away = $_POST['form_away'];

    $stmt = $connect->prepare("INSERT INTO predictions (team_home, team_away, prediction, odds_home, odds_draw, odds_away, form_home, form_away)
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssddss", $team_home, $team_away, $prediction, $odds_home, $odds_draw, $odds_away, $form_home, $form_away);

    if ($stmt->execute()) {
        echo "<p style='color:green;'>Prediction posted successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error posting prediction.</p>";
    }
}
?>