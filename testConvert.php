<?php

namespace myorg;

require_once __DIR__ . '/vendor/autoload.php';

use myorg\advanced\ConvertCsvToSql;
use myorg\advanced\ResultFileException;

if ($handle = opendir('./data')) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            try {
                $converter = new ConvertCsvToSql('./data/' . $entry, './data/');
                $converter->import();
                $res = $converter->getCsvData();
                $converter->createSqlFile();

            } catch (ResultFileException $e) {
                print ('Не удалось конвертировать файл. Ошибка: ' . $e->getMessage());
            } catch (SourceFileException $e) {
                print ('Ошибка: ' . $e->getMessage());
            }
        }
    }

    closedir($handle);
}
