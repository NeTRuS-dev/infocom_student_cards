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

        // TODO: Implement Save() method.
    }
}