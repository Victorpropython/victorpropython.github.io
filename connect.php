<?php
try {
    // Open a connection to the SQLite database
    $db = new PDO('sqlite:teenzee.db');
    
    // Set errormode to exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Example query
    $result = $db->query('SELECT * FROM users');
    foreach($result as $row) {
        echo $row['username'] . "\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

