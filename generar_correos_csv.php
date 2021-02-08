<?php

    class MailGenerator
    {
        public  $init, $limit, $domains;
        
        function __construct($init= 1, $limit = 10000, $domains = ['yopmail.com','getnada.com'])
        {
            $this->init = $init;
            $this->limit = $limit;
            $this->domains = $domains;
        }

        public function createList($prefix = null){
            $prefix = $prefix != null ? $prefix : '';            
            //Counter
            do {
                # code...
                $randomIndex = array_rand($this->domains);
                print_r($prefix.$this->addRandomString(4,$this->init).'@'.$this->domains[$randomIndex].'<br>');
                $this->init++;
            } while ($this->init <= $this->limit);
            
        }

        public function addRandomString($length, $sufix) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString.$sufix;
        }

    }

    $generator = new MailGenerator();    
    $prefix = 'hq_';
    $generator->createList($prefix);