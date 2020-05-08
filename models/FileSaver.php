<?php


namespace app\models;


use yii\base\Model;

class FileSaver extends \yii\base\Model implements ISaver
{
    private string $_fileStoragePath;

    public function __construct()
    {
        parent::__construct();
        $this->_fileStoragePath = \Yii::getAlias('@storage') . DIRECTORY_SEPARATOR . \Yii::$app->params['fileName'];

    }

    public function Save(array $value): bool
    {
        //file_put_contents($this->_fileStoragePath,$this->toArray() , FILE_APPEND);
        //PHP_EOL
        // TODO: Implement Save() method.
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
}