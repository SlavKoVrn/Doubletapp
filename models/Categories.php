<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $icon
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'string', 'max' => 255],
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
            'icon' => 'Картинка',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getCategoriesList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function formName()
    {
        return 's';
    }
}
