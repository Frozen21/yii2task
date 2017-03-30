<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;  
    use yii\bootstrap\Modal;
?>

<div class="row">
    <div class="col-xs-4" style="background-color: #fff">
        <div><h3><span class="label label-default">Task list</span></h3></div>
        <br>
            <?php foreach($tasklists as $j): ?>
                <ul class="list-group">
                    
                        
                        <a href="<?= yii\helpers\Url::to(['task/index', 'id' => $j->id])?>" class="list-group-item list-group-item-action"><?=$j->title?></a>
        
                </ul>
                
            <?php endforeach; ?>
        <?php
            ActiveForm::begin(
                [
                    'action' => ['task/index',],
                    'method' => 'get',
                    'options' => ['class' => 'page-footer']
                ]
            );
            echo '<div class="input-group">';
            echo Html::input(
                'type: text',
                'newtasklist',
                '',
                [
                    'placeholder' => 'New Tasklist...',
                    'class' => 'form-control',
                ]    
            );
            echo '<span class = "input-group-btn">';
            echo Html::submitButton(
                '<span class="glyphicon glyphicon-plus"></span>',
                [
                    'class' => 'btn btn-succes'
                ]    
            );
            echo '</span></div>';
            ActiveForm::end();
            
        ?>
    </div>
    <div class ="col-xs-8" style="background-color: #fff">
        
        <?php if (isset($id)): ?>
            <div><h3><span class="label label-default"><?= $tasklists[$id - 1]->title ?></span></h3></div>
            <br>
        <?php foreach($tasks as $j): ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="badge"><?= $j->created_at ?></span>
                    <?= $j->text ?>    
                </li>
            </ul>
        <?php endforeach; ?>
        
        
        <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
        <br>
            
        <?php
            Modal::begin([
                'size' => 'modal-lg',
                'header' => '<h3>Create task</h3>',
                'toggleButton' => [
                    'label' => '<strong>Create Task</strong>',
                    'tag' => 'button',
                    'class' => 'btn btn-default',
                ],
                'footer' =>  date('l jS \of F Y h:i:s A'),
            ]);
            ActiveForm::begin(
                [
                    'action' => ['task/index', 'id' => $id],
                    'method' => 'get',
                    'options' => ['class' => '']
                ]
            );
            echo '<div class="input-group">';            
            echo Html::input(
                'type: textArea',
                'newtask',                    
                '',
                [
                    'placeholder' => 'New Task...',
                    'class' => 'form-control',
                ]    
            );
            echo '<span class = "input-group-btn">';
            echo Html::submitButton(
                '<span class="glyphicon glyphicon-plus"></span>',
                [
                    'class' => 'btn btn-succes'
                ]    
            );
            echo '</span></div>';
            ActiveForm::end();
            

            Modal::end();
        ?>
        <?php if (!empty($tasks)): ?>
        <span class="input-group-btn">
            <button class="btn btn-default" type="button" onclick="location.href='<?= yii\helpers\Url::to(['task/index', 'id' => $id, 'sort' => true])?>'">
                <strong>Older first</strong>
            </button>
            <button class="btn btn-default" type="button" onclick="location.href='<?= yii\helpers\Url::to(['task/index', 'id' => $id, 'sort' => false])?>'">
                <strong>New first</strong>
            </button>
            <button class="btn btn-default" type="button" onclick="location.href='<?= yii\helpers\Url::to(['task/index', 'id' => $id, 'rate' => true])?>'">
                <strong>By rating</strong>
            </button>
        </span>               
        <?php endif;?>    
        <?php else: ?>
            <div><h3><span class="label label-default">Tasks</span></h3></div>
            <br>
            <h3><p><i>Please create or choose TaskList</i></p></h3>
            <h3><p><i>And have fun :)</i></p></h3>
        <?php endif; ?>
    </div>
</div>

    