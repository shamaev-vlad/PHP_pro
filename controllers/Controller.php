<?php

namespace app\controllers;

abstract class Controller
{

    private $action;

    private $defaultAction = "index";

    private $layout = "main";

    protected $useLayout = true;


    public function run($action = null)
    {

        $this->action = $action ?: $this->defaultAction;

        $action = ucwords(str_replace("-", " ", $action));
        $action = "action" . str_replace(" ", "", $action);
        $this->$action();
    }


    public function render($template, $params)
    {
        if($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}",
                ['content' => $this->renderTemplate($template, $params)]
            );
        }else{
            return $this->renderTemplate($template, $params);
        }
    }


    public function renderTemplate($template, $params)
    {

        extract($params);

        ob_start();

        $templatePath = ROOT_DIR . "/views/{$template}.php";

        include $templatePath;

        return ob_get_clean();
    }

}
