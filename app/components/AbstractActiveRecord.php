<?php declare(strict_types=1);
/**
 * Пример расширения ActiveRecord
 * прописываем для всех моделей вставку аттрибутов 
 * created_at, updated_at через behavior TimestampBehavior
 */

namespace app\components;


use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


class AbstractActiveRecord extends ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class
            ]
        ];
    }

}