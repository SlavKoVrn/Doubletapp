<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%word2theme}}".
 *
 * @property int $id
 * @property int|null $word_id
 * @property int|null $theme_id
 */
class Word2theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%word2theme}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['word_id', 'theme_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'word_id' => 'Слово',
            'theme_id' => 'Тема',
        ];
    }
}
