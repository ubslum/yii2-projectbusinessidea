<?php

namespace ubslum\projectbusinessidea\models;

use Yii;

/**
 * This is the model class for table "newsletter".
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $date_created
 * @property string $date_updated
 * @property int $user_update
 * @property int $status
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'phone'], 'required'],
            [['email'], 'email'],
//            [['email'], 'unique'],
            [['date_created', 'date_updated'], 'safe'],
            [['user_update', 'status'], 'integer'],
            [['fullname', 'email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Tên của bạn',
            'email' => 'Địa chỉ email',
            'phone' => 'Di động',
            'date_created' => 'Ngày tạo',
            'date_updated' => 'Ngày cập nhật',
            'user_update' => 'Tài khoản cập nhật',
            'status' => 'Tình trạng',
        ];
    }

    public function beforeSave($insert) {
        if ($insert) {
            $this->date_created = date('Y-m-d H:i:s');
            $this->status = 1;
        }else{
            $this->date_updated = date('Y-m-d H:i:s');
            $this->user_update = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }
}
