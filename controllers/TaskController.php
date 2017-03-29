<?php

namespace app\controllers;
use app\models\Tasklist;
use app\models\Task;

/**
 * Description of PostController
 *
 * @author Frozen
 */

class TaskController extends AppController{
    
    public function actionIndex() {  
    /*
        $tasklist = Tasklist::find()->select('id, title')->all();
        
      $this->debug($tasklist); 
    */
        $hello = 'Hello, world';
        return $this->render('index', compact('hello'));
        
    }
    
/*    public function actionList() {
        $id = \Yii::$app->request->get('id');        
        $sort = \Yii::$app->request->get('sort');      
           
        if ($sort) {
            $query = Task::find()->select('id, task_id, title, text, rating')->where('task_id = :id', [':id' => $id])->orderBy('rating');
        }
        else {
            $query = Task::find()->select('id, task_id, title, text, rating')->where('task_id = :id', [':id' => $id]);
        }
         
        $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $post = $query->offset($pages->offset)->limit($pages->limit)->all();
        
        $sort = false;
                       
        return $this->render('list', compact('post', 'pages'));
    }
*/    
}
