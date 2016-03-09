Yii2-passfield
===

A password field widget for Yii2 that allows you to display/hide input characters

Installation
---

Either run

```bash
composer require nsept/yii2-passfield "*"
```

or add

```json
"nsept/yii2-passfield": "*"
```

to the `require` section of your `composer.json` file.

Usage
---

```php
<?= \nsept\passfield\PassfieldWidget::widget([
    'form'      => $form,
    'model'     => $model,
    /* 'hint'      => 'Must be greater than or equal to 6', */
    'attribute' => 'password',
    'pluginOptions' => [
        /*
        'iconShow' => '<i class="fa fa-eye"></i>',
        'iconHide' => '<i class="fa fa-eye-slash"></i>',
        'titleShow' => 'Show',
        'titleHide' => 'Hide'
        */
    ]
]) ?>
```
