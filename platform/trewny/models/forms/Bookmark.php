<?php

/*
 * Bookmark.php
 * 
 */

namespace trewny\models\forms;

use Yii;
use yii\base\Model;
//-
use trewny\models\Bookmark as ModelBookmark;

/**
 * @author André Echevarria <echevarriandre@gmail.com>
 */
class Bookmark extends Model {

    /** @var ModelBookmark */
    private $bookmark;

    /** @var string */
    public $title;

    /** @var string */
    public $link;

    /** @var string */
    public $color;

    /**
     * @inheritdoc
     */
    public function rules(): array {
        return [
            [['title', 'link'], 'required', 'message' => 'Can\'t be empty'],
            [['color', 'title', 'link'], 'string']
        ];
    }

    public function __construct(ModelBookmark $bookmark = null) {
        $this->bookmark = $bookmark;

        if ($this->bookmark) {
            $this->title = $this->bookmark->title;
            $this->link = $this->bookmark->link;
            $this->color = $this->bookmark->color ?: null;
        }
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return $this->bookmark ? $this->bookmark->attributeLabels() : (new ModelBookmark())->attributeLabels();
    }

    /**
     * @return bool
     */
    public function save(): bool {
        if ($this->validate()) {
            if (!$this->bookmark) {
                $this->bookmark = new ModelBookmark();
            }

            $transaction = $this->bookmark->getDb()->beginTransaction();

            $this->bookmark->title = $this->title;
            $this->bookmark->link = $this->link;
            $this->bookmark->color = $this->color ?: null;
            $this->bookmark->idAccount = Yii::$app->user->id;

            if ($this->bookmark->save()) {
                $transaction->commit();
                return true;
            }

            $transaction->rollBack();
            return false;

        }
        return false;
    }

    public function getId(): int {
        return $this->bookmark ? $this->bookmark->id : 0;
    }

}
