<?php
namespace myorg\advanced;

class SourceFileException extends BaseException {}
class ResultFileException extends BaseException {}

class ConvertCsvToSql
{
    private string $filename;
    private string $exportPath;
    private $fp;
    private array $result = [];

    /**
     * ConvertCsvToSql constructor.
     * @param $filename
     * @param $exportPath
     */
    public function __construct($filename, $exportPath)
    {
        $this->filename = $filename;
        $this->exportPath = $exportPath;
    }

    /**
     * @throws SourceFileException
     */
    public function import() :void
    {
        if (!file_exists($this->filename)) {
            throw new SourceFileException($this->filename . ' Файл не существует');
        }

        $this->fp = fopen($this->filename, 'rb');

        if (!$this->fp) {
            throw new SourceFileException($this->filename . 'Не удалось открыть файл для чтения');
        }

        foreach ($this->getNextLine() as $key => $line) {
            if ($key > 0) {
                $this->result[] = $line;
            }
        }
    }


    /**
     *
     */
    private function getNextLine():iterable {
        while (!feof($this->fp)) {
            yield fgetcsv($this->fp);
        }
    }

    /**
     * @return array
     */
    private function getHeaderData() :array {
        rewind($this->fp);
        return fgetcsv($this->fp);
    }

    /**
     * @return array
     */
    public function getCsvData() :array {
        return $this->result;
    }

    /**
     * @throws ResultFileException
     */
    public function createSqlFile() :void {
        $filenameSql = basename($this->filename, '.csv') . '.sql';
        $sqlBody = '';
        foreach ($this->result as $key => $line) {
            if (is_array($line)) {
                $sqlBody .= '(' . ("'" . implode("','", $line) . "'") . ')';
                if ($key != (count($this->result) - 2)) {
                    $sqlBody .= (', ' . PHP_EOL);
                }
            }
        }
        if (!file_exists($this->exportPath . $filenameSql)) {
            $fileSql = fopen(($this->exportPath . $filenameSql), 'wb');
            fwrite($fileSql, 'INSERT INTO users (' . (implode(', ', $this->getHeaderData()) . ')' . ' ' . PHP_EOL));
            fwrite($fileSql, 'VALUES ' . $sqlBody . ';');
            fclose($fileSql);
        } else {
            throw new ResultFileException($this->filename . ' Файл уже существует');
        }
    }
}
