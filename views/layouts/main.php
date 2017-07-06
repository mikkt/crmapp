<?php
use yii\helpers\Html;
$this->beginPage()
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRM</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?= $content; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>