<?php

/*
 * m170613_205445_init_schema.php
 * 2017 */

use yii\db\Migration;

class m170613_205445_init_schema extends Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('Account', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull()
        ], 'ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('Account');
    }
}
