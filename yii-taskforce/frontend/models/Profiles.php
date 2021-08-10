<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profiles".
 *
 * @property int $profile_id
 * @property string $address
 * @property string|null $bd
 * @property string|null $about
 * @property string|null $phone
 * @property string|null $skype
 */
class Profiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['bd'], 'safe'],
            [['about'], 'string'],
            [['address', 'phone', 'skype'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'profile_id' => 'Profile ID',
            'address' => 'Address',
            'bd' => 'Bd',
            'about' => 'About',
            'phone' => 'Phone',
            'skype' => 'Skype',
        ];
    }
}
