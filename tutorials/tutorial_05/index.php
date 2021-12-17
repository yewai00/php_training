<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top | tutorial 05</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Tutorial 05</h2>
        <section>
            <h3>1) Content of text file</h3>
            <?php
                $textfile = "text_file.txt";    
                $ft = fopen($textfile, "r");
                $contents = fread($ft, filesize($textfile));    
                echo "<pre>$contents</pre>";
                fclose($ft);
            ?>
        </section> 
        <section>
            <h3>2) Content of excel file</h3>
            <?php
                require 'vendor/autoload.php';
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $reader->setReadDataOnly(true);
                $excelfile = "excel_file.xlsx";
                $spreadsheet = $reader->load($excelfile);
                $sheetData = $spreadsheet->getActiveSheet()->toArray();
                echo "<table>";
                $firstLine = true;
                foreach ($sheetData as $sheet) {
                    echo "<tr>";
                    foreach ($sheet as $cell) {
                        if($cell !== null) {
                            if($firstLine) {
                                echo "<th>" . $cell . "</th>";
                            }
                            else {
                                echo '<td>' . $cell . '</td>';
                            }
                        }
                    }
                    $firstLine = false;
                    echo "</tr>";
                }
                echo "</table>";
            ?>
        </section>
        <section>
            <h3>3) Content of csv file</h3>
            <?php
                $csv = "csv_file.csv";
                $fh = fopen($csv, "r");
                while([$name, $sex, $age, $height, $weight] = fgetcsv($fh, 1024, ",")) {
                echo("<pre>$name, $sex, $age, $height, $weight</pre>");
                }
                fclose($fh);
            ?>
        </section>  
        <section>
            <h3>4) Content of doc file</h3>
            <?php
                $docfile = 'doc_file.doc';
                error_reporting(E_ALL ^ E_DEPRECATED);
                $phpWord = \PhpOffice\PhpWord\IOFactory::load($docfile);
                foreach ($phpWord->getSections() as $section) {
                    foreach ($section->getElements() as $element) {
                        if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                            foreach ($element->getElements() as $el) {
                                if ($el instanceof \PhpOffice\PhpWord\Element\Text) {
                                    echo  "<p>".$el->getText()."</p>";
                                }
                            }
                        }
                    }
                }
            ?>
        </section>
    </div>
</body>
</html>
