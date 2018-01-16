<?php
/**
 * Created by PhpStorm.
 * User: allan
 * Date: 12/01/2018
 * Time: 17:58
 */

class Denuncia
{
    private $id;
    private $questao;
    private $data;
    private $usuario;

    /**
     * Denuncia constructor.
     * @param $questao
     * @param $data
     * @param $usuario
     */
    public function __construct($questao, $data, $usuario)
    {
        $this->questao = $questao;
        $this->data = $data;
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQuestao()
    {
        return $this->questao;
    }

    /**
     * @param mixed $questao
     */
    public function setQuestao($questao)
    {
        $this->questao = $questao;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


}