<?php


class Tipoproduto extends \ActiveRecord\Model
{

    static $table_name = 'tipoproduto';

    static $validates_presence_of = array(
        array('tipo', 'message' => 'Campo obrigatório'),
    );

    static $validates_size_of = array(
        array('tipo', 'maximum' => 50, 'too_long' => 'tipo tem que ser menor'),
    );

    static $has_many = array(
        array('produto')
    );

    public function has_products()
    {
        $produtos = Produto::find_all_by_id_tipoproduto($this->id_tipoproduto);

        if (!empty($produtos)) {
            return true;
        }

        return false;
    }

    public function get_products()
    {
        $produtos = Produto::find_all_by_id_tipoproduto($this->id_tipoproduto);

        if (!empty($produtos)) {
            return $produtos;
        }

        return null;
    }
}
?>