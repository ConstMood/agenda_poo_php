<?php

    class BDD
    {
        public static $_instance = NULL;

        static function getConnection ()
        {
            if (is_null (self ::$_instance)) {
                self ::$_instance = new PDO('mysql:host=localhost;dbname=agenda_poo', 'root', 'fFS6A4s7j9x5R1Pf');
            }
            return self ::$_instance;
        }
    }

