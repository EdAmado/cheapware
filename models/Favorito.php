<?php


class Favorito extends \ActiveRecord\Model
{

    static $table_name = 'favorito';

    static $validates_presence_of = array(
        array('id_utilizador', 'message' => 'Campo obrigatório'),
        array('id_produto', 'message' => 'Campo obrigatório'),
    );

    static $has_one = array(
        array('utilizador'),
        array('produto'),
    );
}
?>