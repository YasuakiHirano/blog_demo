<?php

class Character
{
    public $name;
    public $hp;
    public $mp;

    public function __construct($name, $hp, $mp)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->mp = $mp;
    }

    public function say($text)
    {
        echo "{$this->name}「{$text}」" . "\n";
    }

    public function get_hp()
    {
        return $this->hp;
    }
}

class Hero extends Character
{
    use money;

    public function get_name()
    {
        $this->say('俺は' . $this->name . 'です');
    }

    public function get_money()
    {
        $this->get_money_random();
    }
}

class Slime extends Character
{
    use money;

    public function get_name()
    {
        $this->say($this->name . 'ダゾ');
    }

    public function get_money()
    {
        $this->get_money_random();
    }
}

Trait money
{
    public function get_money_random()
    {
        echo $this->name . "は" . number_format(random_int(0, 1000000)) . 'ゼニーを置いて逃げて行った。' . "\n";
    }
}

$hero = new Hero("ヤスケ", 100, 50);
$slime = new Slime("スライムA", 999, 99);

$hero->get_name();
$slime->get_name();
$hero->say('きみHPいくつよ？');
$slime->say($slime->get_hp() . 'ですが何か？');
$hero->say('ツヨ...');
$hero->get_money();
$slime->get_money();
