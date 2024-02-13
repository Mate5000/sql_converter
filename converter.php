<?php
session_start();
$_SESSION['hiba'] = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    
    $tableName = $_POST['table_name'] ?? 'default_table_name';
    if (isset($_POST['first_row_header'])) {
        $firstRowHeader = true;
    } else {
        $firstRowHeader = false;
    }
    
    if (isset($_POST['first_row_header'])) {
        $firstColumnPK = true;
    } else {
        $firstColumnPK = false;
    }
    // We hope the user didn't lied about pk
    if (isset($_POST['generate_pk'])) {
        $generatePK = true;
    } else {
        $generatePK = false;
    }
    if (isset($_POST['first_column_pk'])) {
        $firstColumnKey = true;
    } else {
        $firstColumnKey = false;
    }

    if ($_POST['radio'] == 'tabulator') {
        $delimiter = "	";

    } 
    if ($_POST['radio'] == 'semicolon') {
        $delimiter = ";";

    } 
    if ($_POST['radio'] == 'comma') {
        $delimiter = ",";

    } 
    
    if ($_POST['radio'] == 'custom') {
        $delimiter = isset($_POST['delimiter']) ? $_POST['delimiter'] : ',';
    } 
    
    // $delimiter = isset($_POST['delimiter']) ? $_POST['delimiter'] : ',';
    // echo $_POST['tabulator'];
    $csvFilePath = $_FILES['csv_file']['tmp_name'];
    $csvData = file_get_contents($csvFilePath);
    $lines = explode(PHP_EOL, $csvData);
    $pkColumnName = 'id';
    if (isset($_POST['first_column_pk'])) {
        $firstColumnKey = true;
    } else {
        $firstColumnKey = false;
    }
$headers = [];
$firstColumnType = 'INTEGER';
if ($firstRowHeader) {
    $headers = str_getcsv(array_shift($lines), $delimiter);
} else {
    $firstLine = str_getcsv($lines[0], $delimiter);
    $secondLine = str_getcsv($lines[1], $delimiter);
    for ($i = 0; $i < count($firstLine); $i++) {
        $headers[] = 'column' . ($i + 1);
    }
    if ($firstColumnPK = true && is_numeric(trim($secondLine[0]))) {
        $generatePK = false;
        // echo(trim($secondLine[0]));
    } else {

        $hiba = "Az első oszlop nem alkalmazható elsődleges kulcsként";
        $_SESSION['hiba'] = $hiba;
        
    }
}

$createTableSQL = "CREATE TABLE IF NOT EXISTS `$tableName`(\n";
if ($generatePK) {
    $createTableSQL .= "  `$pkColumnName` INTEGER AUTO_INCREMENT PRIMARY KEY,\n";
}
foreach ($headers as $index => $header) {
    $columnType = 'VARCHAR(255)';
    $columnExtra = ' NOT NULL';
    
    if ($index == 0) {
        // $columnType = $firstColumnType;
        $secondLine = str_getcsv($lines[1], $delimiter);
        if (isset($_POST['first_column_pk']) && is_numeric(trim($secondLine[0]))) {
            $columnType = 'INTEGER';
        }
        if ($firstColumnKey) {
            $columnExtra .= ' PRIMARY KEY';
        }
    }
    if ($header === 'id' && $generatePK) {
        $header = 'id2';
    }
    $createTableSQL .= "  `$header` $columnType$columnExtra,\n";
}
$createTableSQL = rtrim($createTableSQL, ",\n") . "\n);"; 
    $insertSQL = [];
    foreach ($lines as $line) {
        if (!empty($line)) {
            $rowData = str_getcsv($line, $delimiter); 
            $rowData = array_map(function($value) { return addslashes($value); }, $rowData);
            $insertSQL[] = "INSERT INTO `$tableName` (`" . implode("`, `", $headers) . "`) VALUES ('" . implode("', '", $rowData) . "');";
        }
    }

    $sqlContent = $createTableSQL . "\n" . implode("\n", $insertSQL);
    $_SESSION['sql_content'] = $sqlContent;

    header('Location: gen/');
    // echo($_POST['first_column_pk']);
    // echo('<a href="gen/">gen/</a>');
    exit;
} else {
    // Redirect back to the form if no file was uploaded
    $_SESSION['hiba'] = 'Fájl feltöltés hiba';
    header('Location: index.php?error=NoFileUploaded');
    exit;
}

