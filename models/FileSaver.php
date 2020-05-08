<?php


namespace app\models;


use Throwable;
use yii\base\Model;

class FileSaver extends Model implements ISaver
{
    private string $_fileStoragePath;

    public function __construct()
    {
        parent::__construct();
        $this->_fileStoragePath = \Yii::getAlias('@storage') . DIRECTORY_SEPARATOR . \Yii::$app->params['fileName'];

    }


    public function Save(array $value): bool
    {
        try {
            if (file_exists($this->_fileStoragePath) && boolval(file_get_contents($this->_fileStoragePath))) {
                file_put_contents($this->_fileStoragePath, PHP_EOL . str_repeat("=", 80) . PHP_EOL, FILE_APPEND);
            }
            file_put_contents($this->_fileStoragePath, $this->convertToString($value), FILE_APPEND);

        } catch (Throwable $e) {
            return false;
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function RetrieveData(): string
    {
        if (!file_exists($this->_fileStoragePath)) {
            file_put_contents($this->_fileStoragePath, '');
        }
        return $this->_fileStoragePath;
    }

    private function convertToString(array $value)
    {
        $array_values = array_values($value);
        return implode(PHP_EOL, $array_values);
    }

}