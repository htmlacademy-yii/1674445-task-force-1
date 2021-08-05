<?php

namespace frontend;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $user_id
 * @property string $user_status
 * @property string $user_publishdate
 * @property string $user_email
 * @property string $user_name
 * @property string $user_password
 * @property string|null $user_info
 * @property string $user_role
 * @property string $user_birthday
 * @property string|null $user_categories
 * @property string|null $user_cover_image
 * @property string|null $user_projects_images
 * @property string|null $user_contacts
 * @property string|null $user_notifications
 * @property int|null $user_show_cotacts
 * @property int|null $user_hidden
 * @property string|null $user_messages
 * @property string|null $user_projects
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_status', 'user_publishdate', 'user_email', 'user_name', 'user_password', 'user_role', 'user_birthday'], 'required'],
            [['user_publishdate', 'user_birthday'], 'safe'],
            [['user_info', 'user_categories', 'user_projects_images', 'user_contacts', 'user_notifications', 'user_messages', 'user_projects'], 'string'],
            [['user_show_cotacts', 'user_hidden'], 'integer'],
            [['user_status', 'user_email', 'user_password'], 'string', 'max' => 128],
            [['user_name', 'user_role'], 'string', 'max' => 32],
            [['user_cover_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_status' => 'User Status',
            'user_publishdate' => 'User Publishdate',
            'user_email' => 'User Email',
            'user_name' => 'User Name',
            'user_password' => 'User Password',
            'user_info' => 'User Info',
            'user_role' => 'User Role',
            'user_birthday' => 'User Birthday',
            'user_categories' => 'User Categories',
            'user_cover_image' => 'User Cover Image',
            'user_projects_images' => 'User Projects Images',
            'user_contacts' => 'User Contacts',
            'user_notifications' => 'User Notifications',
            'user_show_cotacts' => 'User Show Cotacts',
            'user_hidden' => 'User Hidden',
            'user_messages' => 'User Messages',
            'user_projects' => 'User Projects',
        ];
    }
}
