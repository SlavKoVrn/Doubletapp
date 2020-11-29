<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%words}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $translation
 * @property string|null $transcription
 * @property string|null $example
 * @property string|null $sound
 */
class Words extends \yii\db\ActiveRecord
{
    public $themes;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%words}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'translation', 'transcription', 'example', 'sound'], 'string', 'max' => 255],
            [['themes'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'name' => 'Название',
            'translation' => 'Перевод',
            'transcription' => 'Транскрипция',
            'example' => 'Пример',
            'sound' => 'Звук',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function afterFind()
    {
        parent::afterFind();

        $this->themes = self::getThemesList($this->id);

    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        $return = parent::beforeSave($insert);

        $now = self::getThemesList($this->id);
        $new = (is_array($this->themes))?$this->themes:[];
        $to_add = array_diff($new,$now);
        $to_delete = array_diff($now,$new);

        $transaction = Yii::$app->db->beginTransaction();
        try {
            foreach ($to_delete as $theme_id){
                $wort2theme = Word2theme::findOne([
                    'word_id'=>$this->id,
                    'theme_id'=>$theme_id,
                ]);
                $wort2theme->delete();
            }
            $saved = true;
            foreach ($to_add as $theme_id){
                $wort2theme = new Word2theme();
                $wort2theme->word_id = $this->id;
                $wort2theme->theme_id = $theme_id;
                $saved = $wort2theme->save() && $saved;
            }
        } catch (\Exception $e) {
            $saved = false;
        }
        $saved ? $transaction->commit() : $transaction->rollBack();

        return $return && $saved;
    }

    /**
     * {@inheritdoc}
     */
    public static function getThemesList($id) {
        return ArrayHelper::map(Word2theme::find()->where(['word_id' => $id])->all(), 'id', 'theme_id');
    }

    /**
     * {@inheritdoc}
     */
    public function formName()
    {
        return 's';
    }
}
