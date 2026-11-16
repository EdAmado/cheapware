<?php

class Utilizador extends \ActiveRecord\Model
{
    // CREDENCIAS (username - password)
    // Mario    -   mario1124   (cliente)
    // Duarte   -   duarte1124  (cliente)
    // Joao     -   joao1124    (funcionario)
    // Rute     -   rute1124    (admin)


    static $table_name = 'utilizador';

    static $validates_presence_of = array(
        array('nomeutilizador', 'message' => 'Campo obrigatório'),
        array('email', 'message' => 'Campo obrigatório'),
        array('password', 'message' => 'Campo obrigatório'),
        array('endereco', 'message' => 'Campo obrigatório'),
        array('contacto', 'message' => 'Campo obrigatório'),
        array('nif', 'message' => 'Campo obrigatório'),
        array('cargo', 'message' => 'Campo obrigatório'),
    );

    static $validates_size_of = array(
        array('nomeutilizador', 'maximum' => 50, 'too_long' => 'Username tem que ser menor'),
        array('email', 'maximum' => 50, 'too_long' => 'Email tem que ser menor'),
        array('password', 'maximum' => 50, 'too_long' => 'Password tem que ser menor'),
        array('endereco', 'maximum' => 50, 'too_long' => 'Endereco tem que ser menor'),
        array('contacto', 'is' => 9, 'message' => 'Formato inválido'),
        array('nif', 'is' => 9, 'message' => 'Formato inválido'),
    );

    static $validates_uniqueness_of = array(
        array('contacto', 'message' => 'Já existe este contacto'),
        array('nif', 'message' => 'Já existe este NIF'),
    );

    static $validates_format_of = array(
        array(
            'email',
            'with' =>
            '/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/',
            'message' => 'Formato inválido'
        ),
    );

    static $has_one = array(
        array('postal', 'class_name' => 'Postal', 'foreign_key' => 'id_postal')
    );

    public function has_favoritos()
    {
        $favoritos = Favorito::find_all_by_id_utilizador($this->id_utilizador);

        if (!empty($favoritos)) {
            return true;
        }

        return false;
    }
}
?>