<?php

namespace frontend;

use Yii;

/**
 * This is the model class for table "chat_messages".
 *
 * @property int $message_id
 * @property string $message_publishdate
 * @property int $message_userid
 * @property int $message_taskid
 * @property string $message_title
 * @property string|null $message_text
 */
class ChatMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chat_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message_publishdate', 'message_userid', 'message_taskid', 'message_title'], 'required'],
            [['message_publishdate'], 'safe'],
            [['message_userid', 'message_taskid'], 'integer'],
            [['message_text'], 'string'],
            [['message_title'], 'string', 'max' => 128],
            [['message_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'message_id' => 'Message ID',
            'message_publishdate' => 'Message Publishdate',
            'message_userid' => 'Message Userid',
            'message_taskid' => 'Message Taskid',
            'message_title' => 'Message Title',
            'message_text' => 'Message Text',
        ];
    }
}
