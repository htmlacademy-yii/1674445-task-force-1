<?php

namespace frontend;

use Yii;

/**
 * This is the model class for table "responses".
 *
 * @property int $response_id
 * @property string $response_publishdate
 * @property int $response_userid
 * @property int $response_taskid
 * @property string $response_title
 * @property string|null $response_text
 */
class Responses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['response_publishdate', 'response_userid', 'response_taskid', 'response_title'], 'required'],
            [['response_publishdate'], 'safe'],
            [['response_userid', 'response_taskid'], 'integer'],
            [['response_text'], 'string'],
            [['response_title'], 'string', 'max' => 128],
            [['response_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'response_id' => 'Response ID',
            'response_publishdate' => 'Response Publishdate',
            'response_userid' => 'Response Userid',
            'response_taskid' => 'Response Taskid',
            'response_title' => 'Response Title',
            'response_text' => 'Response Text',
        ];
    }
}
