<?php

namespace ubslum\projectbusinessidea\models;

use Yii;

/**
 * This is the model class for table "project_business_idea_choice_question".
 *
 * @property int $id_project
 * @property int $id_question
 * @property int $id_answer
 * @property int $points
 */
class ProjectBusinessIdeaChoiceQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_business_idea_choice_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_project', 'id_question', 'id_answer', 'points'], 'required'],
            [['id_project', 'id_question', 'id_answer', 'points'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'Id Project',
            'id_question' => 'Id Question',
            'id_answer' => 'Id Answer',
            'points' => 'Points',
        ];
    }
}
