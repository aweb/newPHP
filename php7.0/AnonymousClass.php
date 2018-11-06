<?php

/**
 * PHP - 匿名类
 *
 * 现在支持通过new class 来实例化一个匿名类，这可以用来替代一些“用后即焚”的完整类定义。
 *
 * Created At 2018/11/6 11:13 AM.
 * User: kaiyanh <nzing@aweb.cc>
 */
interface Logger
{
    public function log(string $msg);
}

class Application
{
    private $logger;

    public function getLogger(): Logger
    {
        return $this->logger;
    }

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }
}

$app = new Application;
$app->setLogger(new class implements Logger
{
    public function log(string $msg)
    {
        echo $msg;
    }
});

$logger = $app->getLogger();
var_dump($logger);
$logger->log("this is log test \n");