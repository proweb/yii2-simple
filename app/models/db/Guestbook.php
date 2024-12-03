<?php declare(strict_types=1); 

namespace app\models\db;

use app\components\AbstractActiveRecord;
use Yii;
 
 
/**
 * This is the model class for table "guestbook".
 *
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string $message
 * @property int $created_at
 * @property int $updated_at
 */
class Guestbook extends AbstractActiveRecord
{
  
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
