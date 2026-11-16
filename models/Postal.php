<?php


class Postal extends \ActiveRecord\Model
{

    static $table_name = 'postal';

    static $validates_presence_of = array(
        array('codigo', 'message' => 'Campo obrigatório'),
        array('localidade', 'message' => 'Campo obrigatório'),
    );

    static $validates_size_of = array(
        array('codigo', 'is' => 8, 'message' => 'Formato inválido'),
        array('localidade', 'maximum' => 50, 'too_long' => 'localidade tem que ser menor'),
    );

    static $validates_format_of = array(
        array(
            'codigo',
            'with' => '/^\d{4}-\d{3}$/',
            'message' => 'Codigo Postal deve ter o formato de XXXX-XXX'
        ),
    );

    static $belongs_to = array(
        array('utilizador', 'class_name' => 'Utilizador', 'foreign_key' => 'id_postal')
    );
}
?>