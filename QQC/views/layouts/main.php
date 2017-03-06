<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'CFPT-Informatique',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Accueil', 'url' => ['/site/index']],
            ['label' => 'À propos', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            [
            'label' => 'CRUDs',
            'items' => [
                 ['label' => 'Lessons', 'url' => 'index.php?r=lesson'],
                 ['label' => 'Students', 'url' => 'index.php?r=students'],
                 ['label' => 'Teachers', 'url' => 'index.php?r=teachers'],
                 ['label' => 'Buildings', 'url' => 'index.php?r=buildings'],
                 ['label' => 'Classrooms', 'url' => 'index.php?r=classrooms'],
                 ['label' => 'Schoolterms', 'url' => 'index.php?r=schoolterms'],
                 ['label' => 'Studentgroups', 'url' => 'index.php?r=studentgroups'],
            ],
            ],
            ['label' => 'Ajout utilisateur [DEBUG]', 'url' => ['/backend-user']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Connexion', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Deconnexion [' . Yii::$app->user->identity->username . ']',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; CFPT-Informatique <?= date('Y') ?></p>
        <p class="pull-right">Made with  &#10084  in CFPT</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
