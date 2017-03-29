<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\base\Widget;

class FirstWidget extends Widget {
    
    public $firstNum;
    public $secondNum;
    
    public function init() {
        
        if($this->firstNum === null){
            
            $this->firstNum = 0;
        }
        
        if($this->secondNum === null){
            
            $this->secondNum = 1;
        }
        
        parent::init();
    }
    
    public function run() {
        
        $mult = $this->firstNum * $this->secondNum;
        
        return $this->render('first', compact('mult'));
    }
}