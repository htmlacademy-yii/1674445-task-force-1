<?php

namespace frontend;

use Yii;

/**
 * This is the model class for table "reviews".
 *
 * @property int $review_id
 * @property string $review_publishdate
 * @property string $review_title
 * @property int|null $review_rating
 * @property string|null $review_text
 */
class Reviews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reviews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['review_publishdate', 'review_title'], 'required'],
            [['review_publishdate'], 'safe'],
            [['review_rating'], 'integer'],
            [['review_text'], 'string'],
            [['review_title'], 'string', 'max' => 128],
            [['review_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'review_id' => 'Review ID',
            'review_publishdate' => 'Review Publishdate',
            'review_title' => 'Review Title',
            'review_rating' => 'Review Rating',
            'review_text' => 'Review Text',
        ];
    }
}
