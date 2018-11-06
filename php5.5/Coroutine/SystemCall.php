<?php
/**
 *
 *
 * Created At 2018/11/5.
 * User: kaiyanh <nzing@aweb.cc>
 */
class SystemCall {
    protected $callback;

    public function __construct(callable $callback) {
        $this->callback = $callback;
    }

    public function __invoke(Task $task, Scheduler $scheduler) {
        $callback = $this->callback;
        return $callback($task, $scheduler);
    }
}