<?php

namespace Mrzkit\PeppaDatabaseTest\Unit;

use Mrzkit\PeppaDatabase\Capsule\Manager as DB;
use Mrzkit\PeppaDatabaseTest\Config\DatabaseConfig;
use Mrzkit\PeppaDatabaseTest\Config\PluginFirstDatabase;
use Mrzkit\PeppaDatabaseTest\Config\PluginSecondDatabase;
use PHPUnit\Framework\TestCase;

class PeppaMultiTest extends TestCase
{
    public function test01()
    {
        $manager1     = DB::resolverDatabaseConfig(DatabaseConfig::class);
        $manager1copy = DB::resolverDatabaseConfig(DatabaseConfig::class);
        // 相同的实例
        var_dump($manager1 === $manager1copy);

        $manager2 = DB::resolverDatabaseConfig(DatabaseConfig::class, 'plugin2');
        // 不同的实例
        var_dump($manager1 === $manager2);

        $manager3 = DB::resolverDatabaseConfig(DatabaseConfig::class, 'plugin3');
        // 不同的实例
        var_dump($manager1 === $manager3);

        // 不同的实例
        var_dump($manager2 === $manager3);

        $this->assertTrue(true);
    }

    public function test02()
    {
        $manager = PluginFirstDatabase::getInstance()->getManager();

        $users = $manager::connection('ali-rds')->table('users')->where('id', 1)->get();

        print_r($users);

        $manager1 = PluginSecondDatabase::getInstance()->getManager();

        var_dump($manager == $manager1);

        $users = $manager1::connection('tencent-rds')->table('users')->where('id', 2)->get();

        print_r($users);

        $this->assertTrue(true);
    }

}
