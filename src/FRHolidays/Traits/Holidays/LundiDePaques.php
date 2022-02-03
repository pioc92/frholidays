<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait LundiDePaques
{
    /**
     * Setting LundiDePaques
     *
     * @param int $year The year to get the holiday in
     */
    private function setLundiDePaques($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);
        $days= $days+1;

        return $date->addDays($days);
    }

    /**
     * Return object of Paques for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getLundiDePaquesHoliday($year = null)
    {
        return $this->getHolidaysByYear("Lundi de Pâques", $year)[0];
    }
}
