<?php
    require_once 'bdd.php';

    class People
    {
        /**
         * @var
         * People's ID
         */
        private $_id;

        /**
         * @var
         * People's NAME
         */
        private $_name;

        public static function findAll ($filters)
        {
            $bdd = BDD ::getConnection ();
            $where = '';
            $clauses = [];
            foreach ( $filters as $k => $filter ) {
                $clauses[] = $k . ' = ' . $bdd -> quote ($filter);
            }

            if (!empty($clauses)) {
                $where = 'WHERE ' . implode (' AND ', $clauses);
            }

            $request = $bdd -> query ('SELECT * FROM people' . $where);
            var_dump ($request);
            return $request -> fetchAll (PDO::FETCH_CLASS, 'People');
        }

        public function getAllPeople ($filters = [])
        {
            $filters['id'] = $this -> _id;
            $people = Vehicules ::findAll ([ 'id' => $this -> _id ]);
            return $people;
        }

        // GETTERS LIST
        public function getPeopleID ()
        {
            return $this -> _id;
        }

        public function getPeopleName ()
        {
            return $this -> _name;
        }

        //Get a person with their name
        public static function getFromName ($name)
        {
            $bdd = BDD ::getConnection ();
            $query = 'SELECT id FROM people WHERE name="' . $name . '"';
            var_dump ($query);
            $request = $bdd -> query ($query);
            $id = $request -> fetch (PDO::FETCH_UNIQUE | PDO::FETCH_COLUMN);

            return new People($id);
        }
    }

    $person = new People(1);
    echo $person -> getPeopleName () . '<br/>';
    echo "----------------" . '<br/>';
    echo $person -> getPeopleID () . '<br/>';
    echo "----------------" . '<br/>';