<?php

use yii\db\Migration;

/**
 * Handles the creation of table `billing`.
 */
class m200429_084539_create_billing_table extends Migration
{
    private $table = '{{%billing}}';
    private $_table_ = 'billing';
    
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
            'users_id' => $this->integer()->notNull(),
            'amount' => $this->double()->notNull(),
            'payment_date' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null(),
        ],
            $tableOptions
        );
    
        $this->createIndex(
            'idx-' . $this->_table_ . '-users_id',
            $this->table,
            'users_id'
        );
    
        $this->addForeignKey(
            'fk-' . $this->_table_ . '-users_id',
            $this->table,
            'users_id',
            'users',
            'id'
        );
    
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-' . $this->_table_ . '-users_id',$this->table);
    
        $this->dropIndex('idx-' . $this->_table_ . '-users_id', $this->table);
    
        $this->dropTable($this->table);
    }
}
