<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m200429_083858_create_users_table extends Migration
{
    private $table = '{{%users}}';
    
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
    
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
    
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'surname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255)->notNull(),
            'address' => $this->string(255)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ],
            $tableOptions
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable($this->table);
    }
}
