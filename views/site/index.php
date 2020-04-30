<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */

$this->title = 'LIVEDUNE';

?>
<div class="site-index">

    <?php
        Pjax::begin();
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Фамилия',
                        'attribute' => 'surname',
                        'headerOptions' =>['class' => 'text-center'],
                    ],
                    [
                        'label' => 'Имя',
                        'attribute' => 'name',
                        'headerOptions' =>['class' => 'text-center'],
                    ],
                    [
                        'label' => 'Отчество',
                        'attribute' => 'patronymic',
                        'headerOptions' =>['class' => 'text-center'],
                    ],
                    [
                        'label' => 'Адрес',
                        'attribute' => 'address',
                        'headerOptions' =>['class' => 'text-center'],
                    ],
                    [
                        'label' => 'Сумма',
                        'attribute' => 'sum_amount',
                        'headerOptions' =>['class' => 'text-center'],
                        'contentOptions' =>['class' => 'text-center'],
                    ],
                ],
            ]);
        Pjax::end();
    ?>

</div>
