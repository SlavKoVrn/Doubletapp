<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Themes;

/**
 * ThemesSearch represents the model behind the search form of `app\models\Themes`.
 */
class ThemesSearch extends Themes
{
    public $wordsCount;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category', 'level'], 'integer'],
            [['name', 'photo'], 'safe'],
            [['wordsCount'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Themes::find()
            ->joinWith('word2theme')
            ->select(['themes.*','wordsCount'=>'count(word2theme.word_id)'])
            ->groupBy('themes.id')
        ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'category',
                'level',
                'name',
                'wordsCount',
            ]
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
            'category' => $this->category,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
