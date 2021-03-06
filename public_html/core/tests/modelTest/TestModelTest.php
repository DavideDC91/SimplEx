<?php

/**
 * Created by PhpStorm.
 * User: Giuseppina Tufano
 * Date: 02/12/2015
 * Time: 08:30
 */


class TestModelTest extends \PHPUnit_Framework_TestCase
{

    const IDTEST = 1; //ci deve essere questo id nel db
    const DESCRIZIONE = "descrizione";
    const DESCRIZIONE2 = "descrizione 2";
    const PUNTEGGIOMAX = 30;
    const PUNTEGGIOMAX2 = 40;
    const NMULTIPLETEST = 8;
    const NMULTIPLETEST2 = 7;
    const NAPERTETEST = 1;
    const NAPERTETEST2 = 3;
    const PERCENTUALESCELTO = 0;
    const PERCENTUALESCELTO2 = 2;
    const PERCENTUALESUCCESSO = 0;
    const PERCENTUALESUCCESSO2 = 1;
    const NUMEROSCELTA1=0;
    const NUMEROSCELTA2=1;
    const MATRICOLASTUDENTE = "0512102390"; //ci deve essere questo studente nel db
    const IDSESSIONE = 1; //ci deve essere questa sessione nel db
    const IDCORSO = 18; //ci deve essere questo corso nel db

    public function testTest()
    {
        $model = new TestModel();

        //testo la read
        $test1 = $model->readTest(self::IDTEST);
        print_r($test1);

        //creo test
        $idTest = $model->createTest(new Test(self::DESCRIZIONE, self::PUNTEGGIOMAX, self::NMULTIPLETEST, self::NAPERTETEST, self::PERCENTUALESCELTO, self::PERCENTUALESUCCESSO, self::PERCENTUALESCELTO, self::PERCENTUALESUCCESSO, self::NUMEROSCELTA1, self::NUMEROSCELTA1, self::IDCORSO));

        //leggo dal db test creato
        $test = $model->readTest($idTest);
        print_r($test);

        //confronto se i test sono equivalenti
        $this->assertEquals(self::DESCRIZIONE, $test->getDescrizione());
        $this->assertEquals(self::PUNTEGGIOMAX, $test->getPunteggioMax());
        $this->assertEquals(self::NMULTIPLETEST, $test->getNumeroMultiple());
        $this->assertEquals(self::NAPERTETEST, $test->getNumeroAperte());
        $this->assertEquals(self::PERCENTUALESCELTO, $test->getPercentualeSceltoEse());
        $this->assertEquals(self::PERCENTUALESUCCESSO, $test->getPercentualeSuccessoEse());
        $this->assertEquals(self::PERCENTUALESCELTO, $test->getPercentualeSceltoVal());
        $this->assertEquals(self::PERCENTUALESUCCESSO, $test->getPercentualeSuccessoVal());
        $this->assertEquals(self::NUMEROSCELTA1, $test->getNumeroSceltaEsercitativa());
        $this->assertEquals(self::NUMEROSCELTA1, $test->getNumeroSceltaValutativa());

        //eseguo una modifica sul test creato
        $model->updateTest($idTest, (new Test(self::DESCRIZIONE2, self::PUNTEGGIOMAX2, self::NMULTIPLETEST2, self::NAPERTETEST2, self::PERCENTUALESCELTO2, self::PERCENTUALESUCCESSO2, self::PERCENTUALESCELTO2, self::PERCENTUALESUCCESSO2, self::NUMEROSCELTA2, self::NUMEROSCELTA2, self::IDCORSO)));

        //leggo il test modificato dal db
        $testModificato = $model->readTest($idTest);

        //confronto le modifiche
        $this->assertEquals(self::DESCRIZIONE2, $testModificato->getDescrizione());
        $this->assertEquals(self::PUNTEGGIOMAX2, $testModificato->getPunteggioMax());
        $this->assertEquals(self::NMULTIPLETEST2, $testModificato->getNumeroMultiple());
        $this->assertEquals(self::NAPERTETEST2, $testModificato->getNumeroAperte());
        $this->assertEquals(self::PERCENTUALESCELTO2, $testModificato->getPercentualeSceltoEse());
        $this->assertEquals(self::PERCENTUALESUCCESSO2, $testModificato->getPercentualeSuccessoEse());
        $this->assertEquals(self::PERCENTUALESCELTO2, $testModificato->getPercentualeSceltoVal());
        $this->assertEquals(self::PERCENTUALESUCCESSO2, $testModificato->getPercentualeSuccessoVal());
        $this->assertEquals(self::NUMEROSCELTA2, $testModificato->getNumeroSceltaEsercitativa());
        $this->assertEquals(self::NUMEROSCELTA2, $testModificato->getNumeroSceltaValutativa());

        //elimino il test dal db
        $model->deleteTest($idTest);

        //leggo tutti i test e verifico che il test sia stato eliminato
        $allTests = $model->getAllTest();
        print_r($allTests);

        //leggo tutti i test del corso
        $allTestsCorso = $model->getAllTestByCorso(self::IDCORSO);
        print_r($allTestsCorso);

        //leggo tutti i test della sessione
        $allTestsSessione = $model->getAllTestBySessione(self::IDSESSIONE);
        print_r($allTestsSessione);

        //leggo il test di un elaborato
        $testElaborato = $model->getTestByElaborato(self::MATRICOLASTUDENTE, self::IDSESSIONE);
        print_r($testElaborato);

        //leggo tutti i test delle sessioni esercitative
        $allTestsEsercitative = $model->getAllTestBySessioneEsercitativa(self::IDCORSO);
        print_r($allTestsEsercitative);

        //leggo tutti i test delle sessioni valutative
        $allTestsValutativa = $model->getAllTestBySessioneValutativa(self::IDCORSO);
        print_r($allTestsValutativa);

    }
}