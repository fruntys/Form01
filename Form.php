<?php

class Form
{
    private $firstName;
    private $secondName;
    private $age;
    private $error;

    public function __construct($firstName, $secondName, $age, $error = null){
        $this->firstName = $firstName;
        $this->secondName = $secondName;
        $this->age = $age;
        $this->error = $error;
    }

    public function getValues(){
        return $this->firstName . " " . $this->secondName . " " . $this->age . " let";
    }

    public function validateFirstName(){
        if (empty($_POST["firstName"])){
            return false;
        }
        else {
          if (is_numeric($_POST["firstName"])){
              return false;
          }
          else {
              return true;
          }
        }
    }

    public function validateSecondName(){
        if (empty($_POST["secondName"])){
            return false;
        }
        else {
            if (is_numeric($_POST["secondName"])){
                return false;
            }
            else {
                return true;
            }
        }
    }

    public function validateAge(){
        if (empty($_POST["age"])){
            return false;
        }
        else {
            if (!is_numeric($_POST["age"])){
                return false;
            }
            else {
                return true;
            }
        }
    }

    public function setError(){
        if (!$this->validateFirstName()){
            $this->error = "Jmeno nebylo spravne zadano!";

            if (!$this->validateSecondName()){
                $this->error = "Jmeno a prijmeni nebylo spravne zadano!";

                if (!$this->validateAge()){
                    $this->error = "Jmeno, prijmeni a vek nebylo spravne zadano!";
                }
            }
            else {
                if (!$this->validateAge()){
                    $this->error = "Jmeno a vek nebylo spravne zadano!";
                }
            }
        }

        else if (!$this->validateSecondName()){
            $this->error = "Prijmeni nebylo spravne zadano!";

            if (!$this->validateAge()){
                $this->error = "Prijmeni a vek nebylo spravne zadano!";
            }
        }

        else if (!$this->validateAge()){
            $this->error = "Vek nebyl spravne zadan!";
        }

    }

    public function getError(){
        return $this->error;
    }
}