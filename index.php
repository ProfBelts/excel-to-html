<?php
ini_set('auto_detect_line_endings', true);

$handle = fopen(__DIR__ . "/us-500.csv", "r");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
        table {
            border: 1px solid black;
            width: 100%;
        }

        td {
            padding: 5px;
            border: 1px solid black;
        }

        .highlight {
            background-color: gray;
        }


    </style>
</head>
<body>
   
<?php
$row = 0;
if (($csv_file = $handle) !== FALSE) {
?>
    <table>
<?php
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
        $column_count = count($read_data);
?>
        <tr>
<?php
        $row++;
        for ($c = 0; $c < $column_count; $c++) {
        $highlight = $row % 10 === 0 ? "highlight" : "";
?>
            <td class = <?=$highlight ?>> <?= $read_data[$c] ?> </td>
<?php 
        }
?>
        </tr>
<?php
    }
    fclose($csv_file);
?>
    </table>
<?php
}
?>

</body>
</html>
