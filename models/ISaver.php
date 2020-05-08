<?php


namespace app\models;


use yii\base\Model;

interface ISaver
{
    public function Save(array $value):bool;
}