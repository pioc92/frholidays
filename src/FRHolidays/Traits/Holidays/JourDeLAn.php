<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait JourDeLAn
{
    /**
     * Setting JourDeLAn
     *
     * @param int $year The year to get the holiday in
     */
    private function setJourDeLAn($year)
    {
        return Carbon::create($year, 1, 1, 0, 0, 0);
    }

    /**
     * Return object of JourDeLAn for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getJourDeLAnHoliday($year = null)
    {
        return $this->getHolidaysByYear("Jour de L'An", $year)[0];
    }
}
