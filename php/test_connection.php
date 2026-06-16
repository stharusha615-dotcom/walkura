<?php
//report all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Walkura Database Diagnostic Tool</h2>";

//configuration options to test
$configs = [
    ["server" => "localhost", "user" => "root", "pass" => "", "port" => 3306],
    ["server" => "localhost", "user" => "root", "pass" => "root", "port" => 3306],
    ["server" => "localhost", "user" => "root", "pass" => "", "port" => 3308], // Common WAMP alternative
    ["server" => "localhost", "user" => "root", "pass" => "root", "port" => 3308]
];

$success = false;

foreach ($configs as $conf) {
    echo "Testing: User: <b>{$conf['user']}</b> | Pass: <b>" . ($conf['pass'] ? 'YES' : 'NO') . "</b> | Port: <b>{$conf['port']}</b> ... ";
    
    try {
        //suppress warnings with @ to handle errors manually
        $conn = @new mysqli($conf['server'], $conf['user'], $conf['pass'], "", $conf['port']);
        
        if ($conn->connect_error) {
            echo "<span style='color:red'>FAILED</span> (Error: " . $conn->connect_error . ")<br>";
        } else {
            echo "<span style='color:green'><b>CONNECTED!</b></span><br>";
            
            //now check if database exists
            $db_selected = $conn->select_db("walkura_db");
            if ($db_selected) {
                echo "<br><b>SUCCESS! Your database 'walkura_db' was found.</b><br>";
                echo "<h3>UPDATE YOUR db_conn.php WITH THESE SETTINGS:</h3>";
                echo "<pre>
                \$servername = \"localhost\";
                \$username = \"{$conf['user']}\";
                \$password = \"{$conf['pass']}\";
                \$dbname = \"walkura_db\";
                \$port = {$conf['port']}; // Add this line if port is 3308

                \$conn = new mysqli(\$servername, \$username, \$password, \$dbname" . ($conf['port'] != 3306 ? ", \$port" : "") . ");
                </pre>";
                $success = true;
                $conn->close();
                break; // Stop testing
            } else {
                echo "<br><b>Connected to Server, but Database 'walkura_db' NOT FOUND.</b><br>";
                echo "Please go to phpMyAdmin and ensure you created a database named exactly <b>walkura_db</b>.<br>";
                $success = true; // Connection worked, just DB missing
                break;
            }
        }
    } catch (Exception $e) {
        echo "<span style='color:red'>ERROR</span>: " . $e->getMessage() . "<br>";
    }
}

if (!$success) {
    echo "<br><hr><b>ALL ATTEMPTS FAILED.</b><br>";
    echo "1. Is your WAMP server running? (Icon should be GREEN)<br>";
    echo "2. Check phpMyAdmin: Can you login with 'root' and no password?";
}
?>