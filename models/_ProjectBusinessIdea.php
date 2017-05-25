<?php

namespace ubslum\projectbusinessidea\models;

use Yii;

/**
 * This is the model class for table "project_business_idea".
 *
 * @property int $id
 * @property string $name
 * @property int $date_created
 * @property string $owner_name
 * @property string $owner_email
 * @property string $owner_phone
 * @property int $points
 * @property int $status
 */
class ProjectBusinessIdea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_business_idea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_created', 'points', 'status'], 'integer'],
            [['name', 'owner_name', 'owner_email'], 'string', 'max' => 255],
            [['owner_phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_created' => 'Date Created',
            'owner_name' => 'Owner Name',
            'owner_email' => 'Owner Email',
            'owner_phone' => 'Owner Phone',
            'points' => 'Points',
            'status' => 'Status',
        ];
    }
}
