<?php

/**
 * User: Giuseppina
 * Date: 20/11/15
 * Time: 11:38
 */
class RispostaMultipla {
    private $elaboratoStudenteMatricola;
    private $elaboratoSessioneId;
    private $alternativaId;
    private $alternativaDomandaMultiplaArgomentoId;
    private $alternativaDomandaMultiplaArgomentoInsegnamentoId;
    private $alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola;
    
    /**
     * Costruttore di Risposta_multipla
     * @param $elaboratoStudenteMatricola la matricola dello studente a cui appartiene l'elaborato relativo
     * @param $elaboratoSessioneId l'id della sessione a cui appartiene l'elaborato relativo
     * @param $alternativaId l'id dell'alternativa scelta
     * @param $alternativaDomandaMultiplaArgomentoId l'id dell'argomento a cui appartiene la domanda multipla relativa
     * @param $alternativaDomandaMultiplaArgomentoInsegnamentoId l'id dell'insegnamento dell'argomento a cui appartiene la domanda multipla relativa
     * @param $alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola la matricola del corso a cui appartiene l'argomento relativo alla domanda multipla cui si riferisce
     * 
     */
    public function __construct($elaboratoStudenteMatricola, $elaboratoSessioneId, $alternativaId, $alternativaDomandaMultiplaArgomentoId, $alternativaDomandaMultiplaArgomentoInsegnamentoId, $alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola) {
        $this->elaboratoStudenteMatricola=$elaboratoStudenteMatricola;
        $this->elaboratoSessioneId=$elaboratoSessioneId;
        $this->alternativaId=$alternativaId;
        $this->alternativaDomandaMultiplaArgomentoId=$alternativaDomandaMultiplaArgomentoId;
        $this->alternativaDomandaMultiplaArgomentoInsegnamentoId=$alternativaDomandaMultiplaArgomentoInsegnamentoId;
        $this->alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola=$alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola;
        
    } 
    
    /**
     * @return la matricola dell'elaborato dello studente
     */
    function getElaboratoStudenteMatricola() {
        return $this->elaboratoStudenteMatricola;
    }

    /**
     * @return l'id della sessione dell'elaborato
     */
    function getElaboratoSessioneId() {
        return $this->elaboratoSessioneId;
    }

    /**
     * @return l'id dell'alternativa scelta
     */
    function getAlternativaId() {
        return $this->alternativaId;
    }

    /**
     * @return l'id dell'argomento a cui appartiene la domanda multipla relativa
     */
    function getAlternativaDomandaMultiplaArgomentoId() {
        return $this->alternativaDomandaMultiplaArgomentoId;
    }

    /**
     * @return l'id dell'insegnamento dell'argomento a cui appartiene la domanda multipla relativa
     */
    function getAlternativaDomandaMultiplaArgomentoInsegnamentoId() {
        return $this->alternativaDomandaMultiplaArgomentoInsegnamentoId;
    }

    /**
     * @return la matricola del corso dell'argomento a cui appartiene l'alternativa scelta
     */
    function getAlternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola() {
        return $this->alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola;
    }

    /**
     * Setta la matricola dell'elaborato dello studente
     * @param $elaboratoStudenteMatricola matricola dell'elaborato dello studente
     */
    function setElaboratoStudenteMatricola($elaboratoStudenteMatricola) {
        $this->elaboratoStudenteMatricola = $elaboratoStudenteMatricola;
    }

    /**
     * Setta l'id dell'elaborato della sessione
     * @param $elaboratoSessioneId id dell'elaborato della sessione
     */
    function setElaboratoSessioneId($elaboratoSessioneId) {
        $this->elaboratoSessioneId = $elaboratoSessioneId;
    }

     /**
     * Setta l'id dell'alternativa scelta
     * @param $alternativaId id alternativa scelta
     */
    function setAlternativaId($alternativaId) {
        $this->alternativaId = $alternativaId;
    }

     /**
     * Setta l'id dell'argomento a cui appartiene la domanda multipla relativa
     * @param $alternativaDomandaMultiplaArgomentoId l'id dell'argomento a cui appartiene la domanda multipla relativa
     */
    function setAlternativaDomandaMultiplaArgomentoId($alternativaDomandaMultiplaArgomentoId) {
        $this->alternativaDomandaMultiplaArgomentoId = $alternativaDomandaMultiplaArgomentoId;
    }

    /**
     * Setta l'id dell'insegnamento dell'argomento a cui appartiene la domanda multipla relativa
     * @param $alternativaDomandaMultiplaArgomentoInsegnamentoId l'id dell'insegnamento dell'argomento a cui appartiene la domanda multipla relativa
     */
    function setAlternativaDomandaMultiplaArgomentoInsegnamentoId($alternativaDomandaMultiplaArgomentoInsegnamentoId) {
        $this->alternativaDomandaMultiplaArgomentoInsegnamentoId = $alternativaDomandaMultiplaArgomentoInsegnamentoId;
    }

    /**
     * Setta la matricola del corso a cui appartiene l'argomento relativo alla domanda multipla cui si riferisce
     * @param $alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola la matricola del corso a cui appartiene l'argomento relativo alla domanda multipla cui si riferisce
     */
    function setAlternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola($alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola) {
        $this->alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola = $alternativaDomandaMultiplaArgomentoInsegnamentoCorsoMatricola;
    }


}
    