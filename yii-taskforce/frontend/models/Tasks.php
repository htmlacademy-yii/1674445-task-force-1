<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id
 * @property string $dt_add
 * @property int $category_id
 * @property string|null $description
 * @property string $expire
 * @property string|null $name
 * @property string|null $address
 * @property string|null $budget
 * @property string|null $lat
 * @property string|null $long
 */
class Tasks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dt_add', 'category_id', 'expire'], 'required'],
            [['dt_add', 'expire'], 'safe'],
            [['category_id'], 'integer'],
            [['description', 'address'], 'string'],
            [['name', 'budget', 'lat', 'long'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'dt_add' => 'Dt Add',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'expire' => 'Expire',
            'name' => 'Name',
            'address' => 'Address',
            'budget' => 'Budget',
            'lat' => 'Lat',
            'long' => 'Long',
        ];
    }
}
