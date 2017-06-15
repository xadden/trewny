
<?php

/*
 * m170614_214834_bookmark_color.php
 * 2017 */

use yii\db\Migration;

class m170614_214834_bookmark_color extends Migration {
    
    /**
     * @inheritdoc
     */
    public function up() {
        $this->addColumn('Bookmark', 'color', $this->string()->defaultValue('#45a7ba'));
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropColumn('Bookmark', 'color');
    }
}
