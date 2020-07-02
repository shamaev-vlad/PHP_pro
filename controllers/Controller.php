<?php

namespace app\controllers;

use app\interfaces\IRender;
use app\models\repositories\UserRepository;
use app\services\Session;

abstract class Controller
{
    protected $defaultAction = 'index';
    protected $action;
    protected $useLayout = true;
    protected $layout = 'layouts/main';
    /** @var IRender */
    protected $renderer;
    protected $session;
    public $currentUser;


    public function __construct(IRender $renderer)
    {
        $this->renderer = $renderer;
        $this->session = App::getInstance()->session;
        $this->request = App::getInstance()->request;
        $this->currentUser = $this->getCurrentUser();
    }

    public function runAction($action = null)
    {
        $this->action = (empty($action)) ? $this->defaultAction : $action;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo $this->render('404');
        }
    }

    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    protected function render(string $template, array $params = [])
    {
        $content = $this->renderer->getContent($template, $params);
        if ($this->useLayout) {
            return $this->renderer->getContent($this->layout, ['content' => $content]);
        }
        return $content;
    }

    private function getCurrentUser()
    {
        if ($this->session->isSet('user_id')) {
            $user_id = $this->session->get('user_id');
            return (new UserRepository())->getById($user_id);
        } else {
            return false;
        }
    }
