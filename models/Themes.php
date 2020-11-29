<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%themes}}".
 *
 * @property int $id
 * @property int|null $category
 * @property int|null $level
 * @property string|null $name
 * @property string|null $photo
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%themes}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'level'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'category' => 'Категория',
            'level' => 'Уровень',
            'name' => 'Название',
            'photo' => 'Фото',
            'wordsCount' => 'Слова',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryModel()
    {
        return $this->hasOne(Categories::class, ['id' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelModel()
    {
        return $this->hasOne(Levels::class, ['id' => 'level']);
    }

    /**
     * @return array
     */
    public static function getThemesList()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * @param $id
     * @return int|string
     */
    public static function getWordsCountForTheme($id)
    {
        return Word2theme::find()->where(['theme_id' => $id])->count();
    }

    public function getWord2theme()
    {
        return $this->hasMany(Word2theme::class,['theme_id'=>'id']);
    }

    public function getWordsCount()
    {
        return count($this->word2theme);
    }

    public function extraFields()
    {
        return [
            'words'=>'words'
        ];
    }

    public function getWords()
    {
        return $this->hasMany(Words::class, ['id' => 'word_id'])->viaTable('Word2theme', ['theme_id' => 'id']);
    }

    public function formName()
    {
        return 's';
    }
}
