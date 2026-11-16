<?php


class Carrinho extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id_produto', 'message' => 'Campo obrigatório'),
        array('quantidade', 'message' => 'Campo obrigatório'),
    );

    static $has_many = array(
        array('produto'),
    );
}
?>