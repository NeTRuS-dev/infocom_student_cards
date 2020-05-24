<?php


namespace app\models;


use DateTime;

class Student extends \yii\base\Model
{
    public string $name = '';
    public string $surname = '';
    public string $patronymic = '';
    public string $dateOfBirth = '';
    public string $address = '';
    public string $phone = '';

    private ISaver $_saver;

    public function __construct(ISaver $saver)
    {
        parent::__construct();
        $this->_saver = $saver;
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'address', 'phone'], 'trim'],
            [['name', 'surname', 'patronymic', 'dateOfBirth', 'address', 'phone'], 'required'],
            ['dateOfBirth', 'date', 'format' => 'yyyy-mm-dd', 'max' => ((new DateTime())->format('yy-m-d')), 'min' => '1147-01-01',],
            ['phone', 'match', 'pattern' => "/^(8-?|\+?7-?)?(\(?\d{3}\)?)-?(\d-?){6}\d$/", 'message' => 'Введите корректный номер телефона']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'dateOfBirth' => 'Дата рождения',
            'address' => 'Адресс регистрации',
            'phone' => 'Номер телефона',
        ];
    }

    public function Save(): bool
    {
        if ($this->validate()) {
            return ($this->_saver->Save($this->toArray()));
        } else {
            return false;
        }
    }
}