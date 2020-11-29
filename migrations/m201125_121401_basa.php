<?php

use yii\db\Migration;

/**
 * Class m201125_121401_basa
 */
class m201125_121401_basa extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'icon' => $this->string(),
        ], $tableOptions);

        $this->batchInsert('{{%categories}}', ['name'], [
            ['People and things'],
            ['Appearance and character'],
            ['Time and dates'],
            [ 'Фразовые глаголы'],
        ]);

        $this->createTable('{{%levels}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->string(),
        ], $tableOptions);

        $this->batchInsert('{{%levels}}', ['name','code'], [
            ['Elementary','A1'],
            ['pre-intermediate',''],
            ['intermediate',''],
            ['upper_intermediate',''],
        ]);

        $this->createTable('{{%themes}}', [
            'id' => $this->primaryKey(),
            'category' => $this->integer(),
            'level' => $this->integer(),
            'name' => $this->string(),
            'photo' => $this->string(),
        ], $tableOptions);

        $this->createIndex(
            '{{%idx-themes-category}}',
            '{{%themes}}',
            'category'
        );

        $this->createIndex(
            '{{%idx-themes-level}}',
            '{{%themes}}',
            'level'
        );

        $this->batchInsert('{{%themes}}', ['name','category','level'], [
            ['Relationship',1,1],
            ['Human body',2,2],
            ['Face',3,3],
            ['Things',4,4],
        ]);

        $this->createTable('{{%words}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'translation' => $this->string(),
            'transcription' => $this->string(),
            'example' => $this->string(),
            'sound' => $this->string(),
        ], $tableOptions);

        $this->batchInsert('{{%words}}', ['name','translation','transcription','example'], [
            [
                'to ask out',
                'Пригласить на свидание',
                'tuː ɑːsk aʊt',
                'John has asked Mary out several times.',
            ]
        ]);

        $this->createTable('{{%word2theme}}', [
            'id' => $this->primaryKey(),
            'word_id' => $this->integer(),
            'theme_id' => $this->integer(),
        ], $tableOptions);

        $this->createIndex(
            '{{%idx-word2theme-word_id}}',
            '{{%word2theme}}',
            'word_id'
        );

        $this->createIndex(
            '{{%idx-word2theme-theme_id}}',
            '{{%word2theme}}',
            'theme_id'
        );

        $this->batchInsert('{{%word2theme}}', ['word_id','theme_id'], [
            [1,1],
            [1,2],
            [1,3],
            [1,4],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
        $this->dropTable('{{%levels}}');
        $this->dropIndex('{{%idx-themes-category}}','{{%themes}}');
        $this->dropIndex('{{%idx-themes-level}}','{{%themes}}');
        $this->dropTable('{{%themes}}');
        $this->dropTable('{{%words}}');
        $this->dropIndex('{{%idx-word2theme-word_id}}','{{%word2theme}}');
        $this->dropIndex('{{%idx-word2theme-theme_id}}','{{%word2theme}}');
        $this->dropTable('{{%word2theme}}');
    }

}
