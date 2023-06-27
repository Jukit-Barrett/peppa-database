<?php

namespace Mrzkit\PeppaDatabase\Connectors;

interface ConnectorInterface
{
    /**
     * @desc 建立数据库连接
     * @param  array  $config
     * @return \PDO
     */
    public function connect(array $config);
}
