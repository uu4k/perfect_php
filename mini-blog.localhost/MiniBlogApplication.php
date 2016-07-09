<?php 

class MiniBlogApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return array(
            '/'                       => array('controller' => 'status', 'action' => 'index'),
            '/status/:action'         => array('controller' => 'status'),
            '/account'                => array('controller' => 'account', 'action' => 'index'),
            '/account/:action'        => array('controller' => 'account'),
            '/user/:user_name'        => array('controller' => 'status',  'action' => 'user'),
            '/user/:user_name/status/:id'
                                      => array('controller' => 'status',  'action' => 'show'),
            '/follow'                 => array('controller' => 'account',  'action' => 'follow'),
            );
    }

    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn'      => 'mysql:dbname=mini_blog;host=localhost',
            'user'     => 'root',
            'password' => 'owarino9629RU@m',
            ));
    }
}