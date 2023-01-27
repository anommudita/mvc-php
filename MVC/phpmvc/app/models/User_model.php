<?php

class User_model
{

    // visibility private
    // data Gus Anom itu bisa diganti dengan data query dari database atau API sangat simple
    private $nama = 'Gus Anom Ganteng';


    // method getUser
    public function getUser()
    {
        return $this->nama;
    }
}