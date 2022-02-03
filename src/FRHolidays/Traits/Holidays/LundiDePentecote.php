<?php

namespace FRHolidays\Traits\Holidays;

use FRHolidays\Carbon;

trait LundiDePentecote
{
    /**
     * Setting Pentecote 50 days after Pâques
     *
     * @param int $year The year to get the holiday in
     */
    private function setLundiDePentecote($year)
    {
        $date = Carbon::create($year, 3, 21, 0, 0, 0);
        $days = easter_days($year);
        $days= $days+50;

        return $date->addDays($days);
    }

    /**
     * Return object of Pentecote for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getLundiDePentecoteHoliday($year = null)
    {
        return $this->getHolidaysByYear("Lundi de Pentecôte", $year)[0];
    }
}
