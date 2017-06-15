
<?php

/*
 * m170613_230656_table_bookmark.php
 * 2017 */

use yii\db\Migration;

class m170613_230656_table_bookmark extends Migration {
    
    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('Bookmark', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'link' => $this->string()->notNull(),
            'image' => $this->string()
        ], 'ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('Bookmark');
    }
}
