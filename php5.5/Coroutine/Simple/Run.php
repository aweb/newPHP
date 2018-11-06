<?php
spl_autoload_register(function ($className) {
    if (is_file('./'.$className.'.php')) {
        require './'.$className.'.php';
    }
});
/**
 *
 * Created At 2018/11/5 9:31 PM.
 * User: kaiyanh <nzing@aweb.cc>
 */

function task1() {
    for ($i = 1; $i <= 10; ++$i) {
        echo "This is task 1 iteration $i.\n";
        yield;
    }
}

function task2() {
    for ($i = 1; $i <= 5; ++$i) {
        echo "This is task 2 iteration $i.\n";
        yield;
    }
}

$scheduler = new Scheduler;

$scheduler->newTask(task1());
$scheduler->newTask(task2());

$scheduler->run();