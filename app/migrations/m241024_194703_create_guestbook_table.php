<?php declare(strict_types=1); 

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%guestbook}}`.
 */
class m241024_194703_create_guestbook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%guestbook}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',            
            'message' => Schema::TYPE_TEXT . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%guestbook}}');
    }
}
