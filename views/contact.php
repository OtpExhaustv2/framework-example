<?php
/** @var $this \Svv\Framework\View */
/** @var $model \App\Models\ContactForm */

use Svv\Framework\Form\Form;

$this->title = "Contact us";
?>

<h1>Contact</h1>

<?php $form = Form::begin("", "post"); ?>

<?= $form->inputField($model, "subject") ?>
<?= $form->inputField($model, "email") ?>
<?= $form->textareaField($model, "body") ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?= Form::end(); ?>
