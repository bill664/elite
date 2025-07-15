<?php 
include 'connect.php';

$prediction = null;
$error = '';

// STEP 1: Fetch prediction by ID if passed in URL
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $connect->prepare("SELECT * FROM predictions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $prediction = $result->fetch_assoc();
    } else {
        $error = "Prediction not found.";
    }
}

// STEP 2: Handle form submission to update prediction
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $team_home = $_POST['team_home'];
    $team_away = $_POST['team_away'];
    $prediction_text = $_POST['prediction'];
    $odds_home = floatval($_POST['odds_home']);
    $odds_draw = floatval($_POST['odds_draw']);
    $odds_away = floatval($_POST['odds_away']);
    $form_home = $_POST['form_home'];
    $form_away = $_POST['form_away'];
    $status = $_POST['status']; // ✅ added for status

    $stmt = $connect->prepare("UPDATE predictions SET team_home=?, team_away=?, prediction=?, odds_home=?, odds_draw=?, odds_away=?, form_home=?, form_away=?, status=? WHERE id=?");
    $stmt->bind_param("sssdddsssi", $team_home, $team_away, $prediction_text, $odds_home, $odds_draw, $odds_away, $form_home, $form_away, $status, $id);

    if ($stmt->execute()) {
        header("Location: admin.php?updated=1");
        exit();
    } else {
        $error = "Update failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Prediction</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }
        form {
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        label {
            font-weight: bold;
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 6px 0 15px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h2>Edit Prediction</h2>

<?php if (!empty($error)): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<?php if ($prediction): ?>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $prediction['id'] ?>">

    <label>Home Team:</label>
    <input type="text" name="team_home" value="<?= $prediction['team_home'] ?>" required>

    <label>Away Team:</label>
    <input type="text" name="team_away" value="<?= $prediction['team_away'] ?>" required>

    <label>Prediction:</label>
    <input type="text" name="prediction" value="<?= $prediction['prediction'] ?>" required>

    <label>Home Odds:</label>
    <input type="number" step="0.01" name="odds_home" value="<?= $prediction['odds_home'] ?>">

    <label>Draw Odds:</label>
    <input type="number" step="0.01" name="odds_draw" value="<?= $prediction['odds_draw'] ?>">

    <label>Away Odds:</label>
    <input type="number" step="0.01" name="odds_away" value="<?= $prediction['odds_away'] ?>">

    <label>Home Team Form:</label>
    <input type="text" name="form_home" value="<?= $prediction['form_home'] ?>">

    <label>Away Team Form:</label>
    <input type="text" name="form_away" value="<?= $prediction['form_away'] ?>">

    
    <label>Status:</label>
    <select name="status">
        <option value="pending" <?= $prediction['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
        <option value="correct" <?= $prediction['status'] === 'won' ? 'selected' : '' ?>>Correct</option>
        <option value="wrong" <?= $prediction['status'] === 'loss' ? 'selected' : '' ?>>Wrong</option>
    </select>

    <button type="submit" name="update" href="matches.php">Update Prediction</button>
</form>
<?php endif; ?>

</body>
</html>

