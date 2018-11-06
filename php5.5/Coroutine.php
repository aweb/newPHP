<?php
/**
 * PHP - 协程
 *
 * http://www.laruence.com/2015/05/28/3038.html
 *
 * 在这篇文章里,我决定去做的是使用协程实现多任务协作.我们要解决的问题是你想并发地运行多任务(或者“程序”）.不过我们都知道CPU在一个时刻只能运行一个任务（不考虑多核的情况）.
 * 因此处理器需要在不同的任务之间进行切换,而且总是让每个任务运行 “一小会儿”.
 *
 * 多任务协作这个术语中的“协作”很好的说明了如何进行这种切换的：它要求当前正在运行的任务自动把控制传回给调度器,这样就可以运行其他任务了.
 * 这与“抢占”多任务相反, 抢占多任务是这样的：调度器可以中断运行了一段时间的任务, 不管它喜欢还是不喜欢.
 * 协作多任务在Windows的早期版本(windows95)和Mac OS中有使用, 不过它们后来都切换到使用抢先多任务了.
 * 理由相当明确：如果你依靠程序自动交出控制的话, 那么一些恶意的程序将很容易占用整个CPU, 不与其他任务共享.
 *
 * 现在你应当明白协程和任务调度之间的关系：yield指令提供了任务中断自身的一种方法, 然后把控制交回给任务调度器.
 * 因此协程可以运行多个其他任务. 更进一步来说, yield还可以用来在任务和调度器之间进行通信.
 *
 * 为了实现我们的多任务调度, 首先实现“任务” — 一个用轻量级的包装的协程函数:
 *
 * Created At 2018/11/5.
 * User: kaiyanh <nzing@aweb.cc>
 */