<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;

class UsersSearch extends Users
{
    public function rules()
    {
        // только поля определенные в rules() будут доступны для поиска
        return [
            [['name', 'surname', 'patronymic', 'address'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $where = '';
    
        if ($this->load($params) && $this->validate()) {
            
            $array = [];
            
            if(!empty($this->name)) $array[] = " u.name LIKE '%$this->name%' ";
            if(!empty($this->surname)) $array[] = " u.surname LIKE '%$this->surname%' ";
            if(!empty($this->patronymic)) $array[] = " u.patronymic LIKE '%$this->patronymic%' ";
            if(!empty($this->address)) $array[] = " u.address LIKE '%$this->address%' ";

            if(count($array) > 0) {
                $where = " WHERE " . implode(" AND ", $array);
            }
        }
    
        $sql = "SELECT u.name, u.surname, u.patronymic, u.address, SUM(amount) AS sum_amount
                FROM users AS u
                LEFT JOIN billing AS b ON (b.users_id = u.id)
                $where
                GROUP BY u.name, u.surname, u.patronymic, u.address";
    
        $count = Yii::$app->db->createCommand("SELECT COUNT(*) FROM ($sql) AS t")->queryScalar();
    
        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 50,
            ],
            'sort' => [
                'attributes' => [
                    'sum_amount'
                ],
                'defaultOrder' => [
                    'sum_amount' => SORT_DESC,
                ],
            ],
        ]);
        
        return $dataProvider;
    }
    
}