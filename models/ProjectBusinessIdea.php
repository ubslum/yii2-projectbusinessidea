<?php

namespace ubslum\projectbusinessidea\models;

use Yii;

/**
 * This is the model class for table "project_business_idea".
 *
 * @property int $id
 * @property string $name
 * @property string $date_created
 * @property string $owner_name
 * @property string $owner_email
 * @property string $owner_phone
 * @property int $points
 * @property int $status
 */
class ProjectBusinessIdea extends \yii\db\ActiveRecord
{
    public $link;
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
            [['name', 'owner_name', 'owner_email'], 'required'],
            [['date_created', 'link'], 'safe'],
            [['points', 'status'], 'integer'],
            [['name', 'owner_name', 'owner_email'], 'string', 'max' => 255],
            [['owner_email'], 'email'],
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
            'name' => 'Dự án',
            'date_created' => 'Ngày',
            'owner_name' => 'Tên',
            'owner_email' => 'Email',
            'owner_phone' => 'Số điện thoại',
            'points' => 'Điểm',
            'status' => 'Tình trạng',
            'link' => 'Đường dẫn'
        ];
    }

    public function beforeSave($insert) {
        if ($insert) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->points = 0;
            $this->status = 0;
        }
        return parent::beforeSave($insert);
    }
}
