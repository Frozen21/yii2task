<?php

namespace app\controllers;
use app\models\Tasklist;
use app\models\Task;

use Yii;

/**
 * Description of PostController
 *
 * @author Frozen
 */

class TaskController extends AppController{
    
    public function actionIndex() {  
        /* TaskList save from Get */
        if (!empty(Yii::$app->request->get('newtasklist')))
            {
                $newtasklist = Yii::$app->request->get('newtasklist');
                $task_list = new Tasklist();
                $task_list->title = $newtasklist;
                $task_list->save();
                $this->goHome();
            }
        /* TaskList get from db */
        $tasklists = Tasklist::find()->select('id, title')->all();
        /* Task save from Get */
        if (!empty(Yii::$app->request->get('id')))
        {
            $id = Yii::$app->request->get('id');
        }
        if (!empty(Yii::$app->request->get('newtask'))&&!empty(Yii::$app->request->get('id')))
            {
                $newtask = Yii::$app->request->get('newtask');
                $task = new Task();
                $task->text = $newtask;
                $task->tasklist_id = Yii::$app->request->get('id');
                $task->rate = 0;                
                $task->save();
                $this->goHome();
            }
        /* Sort*/
        $sort = \Yii::$app->request->get('sort');
        /* Tasks get from db with pagination */
        if (!empty(Yii::$app->request->get('id')))
        {   
            if ($sort)
            {
                $query = Task::find()->select('id, tasklist_id, text, rate, created_at')->where('tasklist_id = :id', [':id' => $id])->orderBy('created_at');
            }
            else
            {
                $query = Task::find()->select('id, tasklist_id, text, rate, created_at')->where('tasklist_id = :id', [':id' => $id])->orderBy('created_at DESC');
            }    
            /* Paginaton */
            $pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 5, 'pageSizeParam' => false, 'forcePageParam' => false]);
            $tasks = $query->offset($pages->offset)->limit($pages->limit)->all();
        }
        /* Deleting tasks */
        $id_task_del = \Yii::$app->request->get('id_task_del');
        if (!empty(Yii::$app->request->get('id_task_del')))
        {
            $task_del = Task::find()->where('id = :id_task_del', [':id_task_del' => $id_task_del])->one();
            $task_del->delete();
        }
            
        return $this->render('index', compact('tasklists', 'id', 'tasks', 'pages'));
        
    }
    
}
