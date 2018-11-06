<?php
/**
 * PHP-Iterator
 *
 * PHP Iterator接口的作用是允许对象以自己的方式迭代内部的数据，从而使它可以被循环访问，Iterator接口摘要如下
 *
 *
 * Iterator extends Traversable {
 * //返回当前索引游标指向的元素
 * abstract public mixed current ( void )
 * //返回当前索引游标指向的键
 * abstract public scalar key ( void )
 * //移动当前索引游标到下一元素
 * abstract public void next ( void )
 * //重置索引游标
 * abstract public void rewind ( void )
 * //判断当前索引游标指向的元素是否有效
 * abstract public boolean valid ( void )
 * }
 *
 * Created At 2018/11/6 1:46 PM.
 * User: kaiyanh <nzing@aweb.cc>
 */

/**
 * 该类允许外部迭代自己内部私有属性$_test，并演示迭代过程
 *
 * @author 疯狂老司机
 */
class TestIterator implements Iterator
{

    /*
     * 定义要进行迭代的数组
     */
    private $_test = array('dog', 'cat', 'pig');

    /*
     * 索引游标
     */
    private $_key = 0;

    /*
     * 执行步骤
     */
    private $_step = 0;

    /**
     * 将索引游标指向初始位置
     *
     * @see TestIterator::rewind()
     */
    public function rewind()
    {
        echo '第'.++$this->_step.'步：执行 '.__METHOD__."\n";
        $this->_key = 0;
    }

    /**
     * 判断当前索引游标指向的元素是否设置
     *
     * @see TestIterator::valid()
     * @return bool
     */
    public function valid()
    {
        echo '第'.++$this->_step.'步：执行 '.__METHOD__."\n";

        return isset($this->_test[$this->_key]);
    }

    /**
     * 将当前索引指向下一位置
     *
     * @see TestIterator::next()
     */
    public function next()
    {
        echo '第'.++$this->_step.'步：执行 '.__METHOD__."\n";
        $this->_key++;
    }

    /**
     * 返回当前索引游标指向的元素的值
     *
     * @see TestIterator::current()
     * @return value
     */
    public function current()
    {
        echo '第'.++$this->_step.'步：执行 '.__METHOD__."\n";

        return $this->_test[$this->_key];
    }

    /**
     * 返回当前索引值
     *
     * @return key
     * @see TestIterator::key()
     */
    public function key()
    {
        echo '第'.++$this->_step.'步：执行 '.__METHOD__."\n";

        return $this->_key;
    }
}

$iterator = new TestIterator();
foreach ($iterator as $key => $value) {
    echo "输出索引为{$key}的元素".":$value".'<br><br>';
}
