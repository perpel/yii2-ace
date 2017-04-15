<?php
namespace yiip\ace\widgets;

use yii\base\Widget;

class Navbar extends Widget
{
    public $baseUrl = '';

    public function run()
    {
        return $this->render('nav-bar/header', [
            'tools'=> [
                'tasks'=>$this->tasks()
            ],
            'personal' => $this->personal()
        ]);
    }

    protected function tasks()
    {
        return $this->render('nav-bar/tasks');
    }

    protected function bell()
    {
        return $this->render('nav-bar/bell');
    }

    protected function message()
    {
        return $this->render('nav-bar/message');
    }

    protected function personal()
    {
        $avatar = \Yii::$app->user->identity->avatar;
        $username = \Yii::$app->user->identity->username;
        return $this->render('nav-bar/personal', [
            'baseUrl' => $this->baseUrl,
            'avatar' => empty($avatar) ? 'default.png' : $avatar,
            'username' => empty($username) ? 'AceAdmin' : $username,
        ]);
    }

}