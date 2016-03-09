<?php

namespace nsept\passfield;

use Yii;
use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\base\InvalidConfigException;
use yii\bootstrap\Html;
use yii\i18n\PhpMessageSource;
use yii\helpers\ArrayHelper;

class PassfieldWidget extends InputWidget
{
    /**
     * @var \yii\widgets\ActiveForm
     */
    public $form;

    /**
     * @var string
     */
    public $template = "{label}<div class=\"input-group\">{input}<a href=\"#\" class=\"input-group-addon passfield-addon\"></a></div>{hint}{error}";

    public $hint;

    /**
     * @var array
     * @see https://github.com/nsept/yii2-passfield
     */
    public $pluginOptions = [

    ];

    /**
     * @inheritdoc
     */
    public function run()
    {
        parent::init();

        PassfieldAsset::register($this->view);

        Yii::$app->get('i18n')->translations['passfield*'] = [
            'class'    => PhpMessageSource::className(),
            'basePath' => __DIR__ . '/messages',
        ];

        if (ArrayHelper::getValue($this->pluginOptions, 'titleShow') === null) {
            $this->pluginOptions['titleShow'] = Yii::t('passfield', 'Show password');
        }

        if (ArrayHelper::getValue($this->pluginOptions, 'titleHide') === null) {
            $this->pluginOptions['titleHide'] = Yii::t('passfield', 'Hide password');
        }

        $pluginOptions = Json::encode($this->pluginOptions);

        $this->view->registerJs(sprintf('$("#%s").passfield(%s)', $this->options['id'], $pluginOptions));

        if ($this->hasModel()) {
            if ($this->form == null) {
                throw new InvalidConfigException(__CLASS__ . '.form property must be specified');
            }

            return $this->form->field($this->model, $this->attribute,
                ['template' => $this->template])->passwordInput($this->options)->hint($this->hint);
        } else {
            return Html::passwordInput($this->name, $this->value, $this->options);
        }
    }
}

