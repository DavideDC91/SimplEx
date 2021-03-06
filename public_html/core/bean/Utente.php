<?php

/**
 * La classe descrive un utente.
 *
 * @author Elvira Zanin
 * @version 1.0
 * @since 27/11/15
 */

class Utente {
    private $matricola;
    private $username;
    private $password;
    private $tipologia;
    private $nome;
    private $cognome;
    private $cdlMatricola;

    /**
     * Costruttore di Utente
     * @param string $matricola La matricola dell'utente
     * @param string $username L'username dell'utente
     * @param string $password La password dell'utente
     * @param string $tipologia La tipologia di utente tra Studente, Docente ed Admin
     * @param string $nome Il nome dell'utente
     * @param string $cognome Il cognome dell'utente
     * @param string $cdlMatricola La matricola del corso di laurea a cui è iscritto l'utente Studente
     */
    public function __construct($matricola, $username, $password, $tipologia, $nome, $cognome, $cdlMatricola) {

        $this->matricola=$matricola;
        $this->username=$username;
        $this->password=$password;
        $this->tipologia=$tipologia;
        $this->nome=$nome;
        $this->cognome=$cognome;
        $this->cdlMatricola=$cdlMatricola;
    }

    /**
     * @return string La matricola
     */
    public function getMatricola() {
        return $this->matricola;
    }
    
    /**
     * @return String L'username dell'utente
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string La password dell'utente
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return string La tipologia dell'utente
     */
    public function getTipologia() {
        return $this->tipologia;
    }

    /**
     * @return string Il nome dell'utente
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * @return string Il cognome dell'utente
     */
    public function getCognome() {
        return $this->cognome;
    }
    
    /**
     * @return string La matricola del corso di laurea a cui è iscritto l'utente Studente
     */
    public function getCdlMatricola() {
        return $this->cdlMatricola;
    }
    
    /**
     * Setta la matricola dell'utente
     * @param string $matricola La matricola dell'utente
     */
    public function setMatricola($matricola) {
        $this->matricola = $matricola;
    }
    
    /**
     * Setta l'username dell'utente
     * @param string $username L'username dell'utente
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * Setta la password dell'utente
     * @param string $password La password dell'utente
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Setta la tipologia dell'utente
     * @param string $tipologia La tipologia dell'utente
     */
    public function setTipologia($tipologia) {
        $this->tipologia = $tipologia;
    }
    
    /**
     * Setta il nome dell'utente
     * @param string $nome Il nome dell'utente
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    /**
     * Setta il cognome dell'utente
     * @param string $cognome Il cognome dell'utente
     */
    public function setCognome($cognome) {
        $this->cognome = $cognome;
    }

    /**
     * Setta la matricola del corso di laurea a cui è iscritto l'utente Studente
     * @param string $cdlMatricola La matricola del corso di laurea a cui è iscritto l'utente Studente
     */
    public function setCldMatricola($cdlMatricola) {
        $this->cdlMatricola = $cdlMatricola;
    }
}