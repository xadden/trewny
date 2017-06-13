<?php

/*
 * migration.php
 *
 */

 // Template usado como base para geração de migrações de base de dados.
 // Usado automaticamente pelo comando [yii migrate/<sub-comando>].
 //-

/* @var $className string the new migration class name */
?>

<?= "<?php\n" ?>

/*
 * <?= $className ?>.php
 * <?= date('Y') ?>
 */

use yii\db\Migration;

class <?= $className ?> extends Migration {
    
    /**
     * @inheritdoc
     */
    public function up() {
    }

    /**
     * @inheritdoc
     */
    public function down() {
        echo "<?= $className ?> cannot be reverted.\n";
        return false;
    }
}
