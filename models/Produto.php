<?php


class Produto extends \ActiveRecord\Model
{

    static $table_name = 'produto';

    static $validates_presence_of = array(
        array('id_tipoproduto', 'message' => 'Campo obrigatório'),
        array('nomeproduto', 'message' => 'Campo obrigatório'),
        array('descricaoproduto', 'message' => 'Campo obrigatório'),
        array('precounitario', 'message' => 'Campo obrigatório'),
        array('quantidadestock', 'message' => 'Campo obrigatório'),
    );

    static $validates_size_of = array(
        array('nomeproduto', 'maximum' => 50, 'message' => 'Nome do produto tem que ser menor'),
        array('descricaoproduto', 'maximum' => 50, 'too_long' => 'Descricao tem que ser menor'),
    );

    static $validates_format_of = array(
        array('precounitario', 'with' => '/^\d+(\.\d{1,2})?$/', 'message' => 'Preço tem que ser um numero decimal')
    );

    static $validates_numericality_of = array(
        array('quantidadestock', 'greater_than' => 0, 'message' => 'Campo obrigatório')
    );


    static $belongs_to = array(
        array('tipoproduto', 'class_name' => 'Tipoproduto', 'foreign_key' => 'id_tipoproduto')
    );

    public function is_favorito()
    {
        $user = Utilizador::find_by_id_utilizador($_SESSION['userID']);

        $favorito = Favorito::find_by_id_utilizador_and_id_produto($user->id_utilizador, $this->id_produto);

        if ($favorito != null) {
            return true;
        }

        return false;
    }
}
?>