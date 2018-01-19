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
    private $idquestao;
    private $data;
    private $idusuario;

    /**
     * Denuncia constructor.
     * @param $questao
     * @param $data
     * @param $usuario
     */
    public function __construct($idquestao, $data, $idusuario)
    {
        $this->idquestao = $idquestao;
        $this->data = $data;
        $this->idusuario = $idusuario;
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
    public function getIdQuestao()
    {
        return $this->idquestao;
    }

    /**
     * @param mixed $questao
     */
    public function setIdQuestao($idquestao)
    {
        $this->idquestao = $idquestao;
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
    public function getIdUsuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }


}