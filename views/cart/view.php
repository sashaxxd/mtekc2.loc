<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="container" style="padding: 50px 20px 50px 20px;">
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif;?>

    <?php if( Yii::$app->session->hasFlash('error') ): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif;?>
<?php if(!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Артикул</th>
                <th>Кол-во Мx</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($session['cart'] as $id => $item):?>
                <tr>
                    <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['alt' => $item['name'], 'height' => 60, 'width'
                        => 60] ) ?></a></td>
                    <td><a href="<?= Url::to(['product/view', 'id' => $id])?>"><?= $item['name']?></a> </td>
                    <td><?= $item['article']?></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['qty'] * $item['price']?></td>
                    <td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach?>

            <tr>
                <td colspan="6">Итого Мx: </td>
                <td><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="6">На сумму: </td>
                <td><?= $session['cart.sum']?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <hr/>
    <?php $form = ActiveForm::begin() ?>
        <?= $form->field($order, 'name')?>
        <?= $form->field($order, 'email')?>
        <?= $form->field($order, 'phone')?>
        <?= $form->field($order, 'address')?>
    <?= Html::submitButton('Заказать', ['class' => 'btn', 'id' => 'Button_cart'])?>
    <?php ActiveForm::end() ?>
<?php else: ?>
    <div class="cartmod"><h3>Корзина пуста</h3></div>
<?php endif;?>
</div>
