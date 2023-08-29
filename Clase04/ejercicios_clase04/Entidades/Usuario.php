<?php

namespace Entidades;

class Usuario
{
    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $foto;

    /**
     * Constructor de la clase Usuario.
     *
     * @param string      $nombre El nombre del usuario.
     * @param string      $clave  La clave del usuario.
     * @param string      $mail   El correo electrónico del usuario.
     * @param string|null $foto   La ruta de la foto del usuario (opcional).
     */
    public function __construct($nombre, $clave, $mail, $foto = null)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->foto = $foto;
    }

    /**
     * Obtiene el ID del usuario.
     *
     * @return int El ID del usuario.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string El nombre del usuario.
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Obtiene la clave del usuario.
     *
     * @return string La clave del usuario.
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * Obtiene el correo electrónico del usuario.
     *
     * @return string El correo electrónico del usuario.
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Obtiene la foto del usuario.
     *
     * @return string|null La ruta de la foto del usuario o null si no hay foto.
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param int $id El ID del usuario.
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}
