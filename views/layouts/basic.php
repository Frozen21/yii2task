<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* @var content string */
AppAsset::register($this);
$this->beginPage();
?>

<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php
            $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);
        ?>
        <title>
            <?= Yii::$app->name ?>
        </title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
                NavBar::begin(
                    [    
                        'options' => [
                            'id' => 'main-menu'
                        ],
                        'brandLabel' => 'TaskList',
                        'renderInnerContainer' => true,
                        'innerContainerOptions' => [
                            'class' => 'container',
                        ],
                        'brandUrl' => [
                            'task/index',
                        ],
                        'brandOptions' => [
                            'class' => 'navbar-brand'
                        ]
                    ]
                );
                NavBar::End();
            ?>
            <div class="container">
                <?= $content ?>
            </div>
        </div>
        
        <footer class="footer">
            <div class="container">
                <span class="badge">
                    <span class="glyphicon glyphicon-copyright-mark"></span>TaskList <?=date('Y') ?>
                </span>                
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php
    $this->endPage();


