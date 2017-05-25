<?php

namespace ubslum\projectbusinessidea\models;

use Yii;

/**
 * This is the model class for table "choice_question_answer".
 *
 * @property int $id
 * @property int $id_question
 * @property string $content
 * @property int $points
 * @property int $user_update
 * @property string $date_created
 * @property string $date_updated
 * @property int $status
 */
class ChoiceQuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'choice_question_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_question', 'points', 'content'], 'required'],
            [['id_question', 'points', 'user_update', 'status'], 'integer'],
            [['content'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_question' => 'Câu hỏi',
            'content' => 'Nội dung',
            'points' => 'Điểm số',
            'user_update' => 'Tài khoản cập nhật',
            'date_created' => 'Ngày tạo',
            'date_updated' => 'Ngày cập nhật',
            'status' => 'Tình trạng',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) {
        if ($insert) {
            $this->user_update = Yii::$app->user->id;
            $this->date_created = date('Y-m-d H:i:s');
            $this->status = 0;
        }else{
            $this->date_updated = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
