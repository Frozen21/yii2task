<?php

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Tasklist
 *
 * @author Frozen
 */

class Tasklist extends ActiveRecord{
    
    public static function tableName() {
        return 'tasklist';
    }
    
}
