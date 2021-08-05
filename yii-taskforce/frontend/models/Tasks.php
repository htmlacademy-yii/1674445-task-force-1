<?php

namespace frontend;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property int $task_id
 * @property string $task_status
 * @property string $task_publishdate
 * @property string $task_editdate
 * @property string $task_closedate
 * @property int $task_customer_id
 * @property int|null $task_developer_id
 * @property string $task_title
 * @property string|null $task_info
 * @property string|null $task_categories
 * @property string|null $task_cover_image
 * @property string|null $task_projects_images
 * @property string|null $task_projects_files
 * @property string|null $task_notifications
 * @property int|null $task_responses
 * @property string|null $task_messages
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
            [['task_status', 'task_publishdate', 'task_editdate', 'task_closedate', 'task_customer_id', 'task_title'], 'required'],
            [['task_publishdate', 'task_editdate', 'task_closedate'], 'safe'],
            [['task_customer_id', 'task_developer_id', 'task_responses'], 'integer'],
            [['task_info', 'task_categories', 'task_projects_images', 'task_projects_files', 'task_notifications', 'task_messages'], 'string'],
            [['task_status'], 'string', 'max' => 128],
            [['task_title'], 'string', 'max' => 32],
            [['task_cover_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'task_id' => 'Task ID',
            'task_status' => 'Task Status',
            'task_publishdate' => 'Task Publishdate',
            'task_editdate' => 'Task Editdate',
            'task_closedate' => 'Task Closedate',
            'task_customer_id' => 'Task Customer ID',
            'task_developer_id' => 'Task Developer ID',
            'task_title' => 'Task Title',
            'task_info' => 'Task Info',
            'task_categories' => 'Task Categories',
            'task_cover_image' => 'Task Cover Image',
            'task_projects_images' => 'Task Projects Images',
            'task_projects_files' => 'Task Projects Files',
            'task_notifications' => 'Task Notifications',
            'task_responses' => 'Task Responses',
            'task_messages' => 'Task Messages',
        ];
    }
}
