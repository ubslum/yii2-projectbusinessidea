<?php

namespace ubslum\projectbusinessidea\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ubslum\projectbusinessidea\models\ChoiceQuestionGroup;

/**
 * ChoiceQuestionGroupSearch represents the model behind the search form of `ubslum\projectbusinessidea\models\ChoiceQuestionGroup`.
 */
class ChoiceQuestionGroupSearch extends ChoiceQuestionGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_update', 'status'], 'integer'],
            [['name', 'date_created', 'date_updated'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ChoiceQuestionGroup::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_update' => $this->user_update,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
