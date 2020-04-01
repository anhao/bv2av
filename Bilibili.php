<?php
/**
 * @author : Alone88
 *
 * algorithm:https://www.zhihu.com/question/381784377/answer/1099438784
 *
 * Bilibili AV BV 互转
 *
 * Class Bilibili
 */
class Bilibili
{
    protected $tr = "fZodR9XQDSUm21yCkr6zBqiveYah8bt4xsWpHnJE7jL5VG3guMTKNPAwcF";
    protected $xor = 177451812;
    protected $add = 8728348608;
    protected $s = [11, 10, 3, 8, 4, 6];

    /**
     * BV 转 AV
     *
     * @param $bv
     * @return int
     */
    public function dec($bv)
    {
        $r = 0;
        $tr = array_flip(str_split($this->tr));
        for ($i = 0; $i < 6; $i++) {
            $r += $tr[$bv[$this->s[$i]]] * (pow(58, $i));
        }
        return ($r - $this->add) ^ $this->xor;
    }

    /**
     *
     * AV 转 BV
     *
     * @param $av
     * @return string
     */
    public function enc($av)
    {
        $tr = str_split($this->tr);
        $bv = 'BV1  4 1 7  ';
        $av = ($av ^ $this->xor) + $this->add;
        for ($i = 0; $i < 6; $i++) {
            $bv[$this->s[$i]] = $tr[floor($av/pow(58,$i)%58)];
        }
        return $bv;
    }
}