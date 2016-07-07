<?php 

class DbManager
{
    protected $connections = array();

    // repository <=> db connection
    protected $repository_connection_map = array();

    // Repositoryのキャッシュ
    protected $repositories = array();

    public function connect($name, $pdo_params)
    {
        $pdo_params = array_merge(array(
            'dsn'     => null,
            'user'    => '',
            'password'=> '',
            'options' => array(),
            ),$pdo_params);

        $con = new PDO(
            $pdo_params['dsn'],
            $pdo_params['user'],
            $pdo_params['password'],
            $pdo_params['options']
            );

        // PDO内部でエラー発生した際に例外出すよう設定
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->connections[$name] = $con;
    }

    public function getConnection($name = null)
    {
        if (is_null($name)) {
            return current($this->connections);
        }

        return $this->connections[$name];
    }

    public function setRepositoryConnectionMap($repository_name, $connection_name)
    {
        $this->repository_connection_map[$repository_name] = $connection_name;
    }

    public function getConnectionForRepository($repository_name)
    {
        if (isset($this->repository_connection_map[$repository_name])) {
            $name = $this->repository_connection_map[$repository_name];
            $con = $this->getConnection($name);
        } else {
            $con = $this->getConnection();
        }

        return $con;
    }

    public function get($repository_name)
    {
        if (!isset($this->repositories[$repository_name])) {
            $repository_class = $repository_name . 'Repository';
            $con = $this->getConnectionForRepository($repository_name);

            $repository = new $repository_class($con);

            $this->repositories[$repository_name] = $repository;
        }

        return $this->repositories[$repository_name];
    }

    public function __destruct()
    {
        foreach ($this->repositories as $repository) {
            unset($repository);
        }

        foreach ($this->connections as $con) {
            unset($con);
        }
    }
}