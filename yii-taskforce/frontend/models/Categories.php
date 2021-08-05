<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $cat_id
 * @property string $cat_publishdate
 * @property string $cat_name
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_publishdate', 'cat_name'], 'required'],
            [['cat_publishdate'], 'safe'],
            [['cat_name'], 'string', 'max' => 128],
            [['cat_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_publishdate' => 'Cat Publishdate',
            'cat_name' => 'Cat Name',
        ];
    }
}
