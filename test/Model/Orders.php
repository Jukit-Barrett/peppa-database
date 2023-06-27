<?php

namespace Mrzkit\PeppaDatabaseTest\Model;

use Mrzkit\PeppaDatabase\Query\Model;

class Orders extends Model
{
    /**
     * @var string 表前缀
     */
    protected $tablePrefix = 'mrz_';

    /**
     * @var string 表名
     */
    protected $table = 'orders';

    /**
     * @var string 连接
     */
    protected $connection = 'tencent-rds';

}
