<?php

namespace FRHolidays\Traits;

use FRHolidays\Carbon;
use FRHolidays\Traits\Holidays\Armistice;
use FRHolidays\Traits\Holidays\Ascension;
use FRHolidays\Traits\Holidays\Assomption;
use FRHolidays\Traits\Holidays\FeteDuTravail;
use FRHolidays\Traits\Holidays\FeteNationale;
use FRHolidays\Traits\Holidays\JourDeLAn;
use FRHolidays\Traits\Holidays\LundiDePaques;
use FRHolidays\Traits\Holidays\Noel;
use FRHolidays\Traits\Holidays\Paques;
use FRHolidays\Traits\Holidays\Pentecote;
use FRHolidays\Traits\Holidays\Toussaint;
use FRHolidays\Traits\Holidays\Victoire1945;

trait Holiday
{
    use Armistice;
    use Ascension;
    use Assomption;
    use FeteDuTravail;
    use FeteNationale;
    use JourDeLAn;
    use LundiDePaques;
    use Noel;
    use Paques;
    use Pentecote;
    use Toussaint;
    use Victoire1945;

    /**
     * Get holiday data
     *
     * @param int|null $year The year to get the holidays in
     */
    private function holidays( $year = null ) {
        $this->setTime(0,0,0);
        $holidays = array(
            array(
                'name' => "Jour de L'An",
                'search_names' => ["JOUR DE L'AN", "1ER JANVIER", "PREMIER JANVIER"],
                'date' => function() use ($year) {
                    return $this->setJourDeLAn($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Lundi de Pâques",
                'search_names' => ["LUNDI DE PAQUES"],
                'date' => function() use ($year) {
                    return $this->setLundiDePaques($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Fête du Travail",
                'search_names' => ["FETE DU TRAVAIL"],
                'date' => function() use ($year) {
                    return $this->setFeteDuTravail($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Victoire 1945",
                'search_names' => ["VICTOIRE 1945", "VICTOIRE"],
                'date' => function() use ($year) {
                    return $this->setVictoire1945($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Ascension",
                'search_names' => ["ASCENSION"],
                'date' => function() use ($year) {
                    return $this->setAscension($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Pentecôte",
                'search_names' => ["PENTECOTE"],
                'date' => function() use ($year) {
                    return $this->setPentecote($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Fête Nationale",
                'search_names' => ["FETE NATIONALE", "14 JUILLET"],
                'date' => function() use ($year) {
                    return $this->setFeteNationale($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Assomption",
                'search_names' => ["ASSOMPTION"],
                'date' => function() use ($year) {
                    return $this->setAssomption($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Toussaint",
                'search_names' => ["TOUSSAINT"],
                'date' => function() use ($year) {
                    return $this->setToussaint($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Armistice",
                'search_names' => ["ARMISTICE"],
                'date' => function() use ($year) {
                    return $this->setArmistice($year);
                },
                'bank_holiday' => true
            ),
            array(
                'name' => "Noël",
                'search_names' => ["NOEL"],
                'date' => function() use ($year) {
                    return $this->setNoel($year);
                },
                'bank_holiday' => false
            ),
            
        );

        foreach ($holidays as $key => $holiday) {
            if(!in_array($holiday['name'], $this->holidayArray) && !array_intersect($holiday['search_names'], $this->holidayArray)) {
                unset($holidays[$key]);
            }

            if($this->bankHolidayArray != ['default']) {
                if(in_array($holiday['name'], $this->bankHolidayArray) || array_intersect($holiday['search_names'], $this->bankHolidayArray)) {
                    $holidays[$key]['bank_holiday'] = true;
                } else {
                    $holidays[$key]['bank_holiday'] = false;
                }
            }
        }

        $userHolidays = $this->userAddedHolidays;

        foreach ($userHolidays as $userHoliday) {

            if(is_callable($userHoliday['date'])) {
                $date = $userHoliday['date'];
            } else {
                $date = function() use ($year, $userHoliday) {
                    $day = $userHoliday['date']->day;
                    $month = $userHoliday['date']->month;
                    return Carbon::create($year, $month, $day, 0, 0, 0);
                };
            }

            $bankHoliday = $userHoliday['bank_holiday'];

            array_push($holidays,
                array(
                    'name' => $userHoliday['name'],
                    'search_names' => [\strtoupper($userHoliday['name']), \strtoupper(\str_replace("'", '', $userHoliday['name']))],
                    'date' => $date,
                    'bank_holiday' => $bankHoliday
                )
            );
        }

        return array_values($holidays);
    }
}
