<?php


namespace app\models;


use yii\base\Model;

interface ISaver
{
    public function Save(array $value): bool;

    /**
     * @return string path to txt file with generated data from any source
     */
    public function RetrieveData(): string;
}