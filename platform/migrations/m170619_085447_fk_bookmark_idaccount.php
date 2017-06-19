
<?php

/*
 * m170619_085447_fk_bookmark_idaccount.php
 * 2017 */

use yii\db\Migration;

class m170619_085447_fk_bookmark_idaccount extends Migration {
    
    /**
     * @inheritdoc
     */
    public function up() {
        $this->addColumn('Bookmark', 'idAccount', $this->integer()->notNull());
        $this->addForeignKey('fkBookmarkAccount', 'Bookmark', 'idAccount', 'Account', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropColumn('Bookmark', 'idAccount');
    }
}
