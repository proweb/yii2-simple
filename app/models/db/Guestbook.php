<?php

namespace app\models\db;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "guestbook".
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string $message
 * @property int $created_at
 */
class Guestbook extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                ],
                'value' => time(), // тут вставляем нужную функцию генерации даты (может быть и просто `time()`)
            ],
        ];
     }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guestbook';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'message', ], 'required'],
            [['message'], 'string'],
            [['email'], 'email'],
            [['name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'name' => 'Ваше имя',
            'email' => 'Email',
            'message' => 'Ваше сообщение',
            'created_at' => 'Создано',
        ];
    }
}
