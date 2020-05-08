<?php


namespace app\models;


class Student extends \yii\base\Model
{
    public string $name;
    public string $surname;
    public string $patronymic;
    public string $dateOfBirth;
    public string $address;
    public string $phone;
    private string $_fileStoragePath;

    public function __construct()
    {
        parent::__construct();
        $this->_fileStoragePath = \Yii::getAlias('@storage') . DIRECTORY_SEPARATOR . \Yii::$app->params['fileName'];
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'address', 'phone'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            [['name', 'surname', 'patronymic', 'dateOfBirth', 'address', 'phone'], 'required'],
            ['dateOfBirth', 'date'],
            ['phone', 'match', 'pattern' => '^((\+7|7|8)+([0-9]){10})$', 'message' => 'Введите корректный номер телефона']
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

    public function Save()
    {
        if ($this->validate()) {
            file_put_contents($this->_fileStoragePath,$this->toArray() , FILE_APPEND);
        } else {
            return false;
        }
    }
}