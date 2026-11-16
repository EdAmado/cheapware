<?php


class Compra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id_utilizador', 'message' => 'Campo obrigatório'),
        array('id_carrinho', 'message' => 'Campo obrigatório'),
        array('datacompra', 'message' => 'Campo obrigatório'),
    );

    static $has_one = array(
        array('carrinho'),
    );

    static $belongs_to = array(
        array('utilizador'),
    );
}
?>