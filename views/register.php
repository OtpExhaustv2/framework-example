<?php
use Svv\Framework\Form\Form;
/** @var $model \App\Models\User */
?>
<h1>Create an account</h1>

<?php $form = Form::begin("", "post") ?>
    <div class="row">
        <div class="col">
            <?= $form->inputField($model, "firstname") ?>
        </div>
        <div class="col">
            <?= $form->inputField($model, "lastname") ?>
        </div>
    </div>
    <?= $form->inputField($model, "email") ?>
    <?= $form->inputField($model, "password")->passwordField() ?>
    <?= $form->inputField($model, "passwordConfirm")->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>

