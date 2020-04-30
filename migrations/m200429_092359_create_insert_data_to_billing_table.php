<?php

use yii\db\Migration;
use app\models\Users;
use app\models\Billing;

/**
 * Handles the creation of table `insert_data_to_billing`.
 */
class m200429_092359_create_insert_data_to_billing_table extends Migration
{
    private $table = '{{%billing}}';
    
    /**
     * @inheritdoc
     */
    public function up()
    {
        Billing::deleteAll([]);
        
        $users = Users::find()->all();
        
        foreach ($users as $user) {
            
            $count = rand(2, 10);
            
            for ($i = 0; $i < $count; $i++) {
    
                $this->insert($this->table, [
                    'users_id' => $user->id,
                    'amount' => rand(500, 5000),
                    'payment_date' => rand(0, time()),
                    'created_at' => time(),
                    'updated_at' => null,
                ]);
                
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        Billing::deleteAll([]);
    }
}
