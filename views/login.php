<?php
/** @var $model \App\Models\User */

use Svv\Framework\Form\Form;

?>

<h1>Login</h1>

<?php $form = Form::begin("", "post") ?>

    <?= $form->inputField($model, "email") ?>
    <?= $form->inputField($model, "password")->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end();
