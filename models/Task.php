<?php

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Task
 *
 * @author Frozen
 */

class Task extends ActiveRecord{
    
    public static function tableName() {
        return 'task';
    }
    
}
