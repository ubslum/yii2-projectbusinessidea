<?php

namespace ubslum\projectbusinessidea\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use ubslum\projectbusinessidea\models\ProjectBusinessIdea;

/**
 * ProjectBusinessIdeaSearch represents the model behind the search form of `ubslum\projectbusinessidea\models\ProjectBusinessIdea`.
 */
class ProjectBusinessIdeaSearch extends ProjectBusinessIdea
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'date_created', 'points', 'status'], 'integer'],
            [['name', 'owner_name', 'owner_email', 'owner_phone'], 'safe'],
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
        $query = ProjectBusinessIdea::find();

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
            'date_created' => $this->date_created,
            'points' => $this->points,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'owner_email', $this->owner_email])
            ->andFilterWhere(['like', 'owner_phone', $this->owner_phone]);

        return $dataProvider;
    }
}
