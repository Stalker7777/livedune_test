<?php

use yii\db\Migration;
use app\models\Users;

/**
 * Handles the creation of table `insert_data_to_users`.
 */
class m200429_091009_create_insert_data_to_users_table extends Migration
{
    private $table = '{{%users}}';
    
    /**
     * @inheritdoc
     */
    public function up()
    {
        Users::deleteAll([]);
        
        for ($i = 1; $i <= 1000; $i++) {
    
            $this->insert($this->table, [
                'id' => $i,
                'name' => 'name' . $i,
                'surname' => 'surname' . $i,
                'patronymic' => 'patronymic' . $i,
                'address' => 'address' . $i,
                'created_at' => time(),
                'updated_at' => null,
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        Users::deleteAll([]);
    }
}
