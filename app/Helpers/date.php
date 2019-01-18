<?php
use App\Brand;
/**
 * Return a formatted Carbon date.
 *
 * @param  Carbon\Carbon $date
 * @param  string $format
 * @return string
 */
function humanize_date(Carbon\Carbon $date, $format = 'd F Y, H:i'): string
{
    return $date->format($format);
}
function humanize_date_with_timezone(Carbon\Carbon $date, $format = 'd F Y, H:i', $timezone = 'Asia/Kolkata'): string
{
	$branding = Brand::where('id', 1)->first();
	//dd($branding);
	if($timezone)
	{
		return $date->timezone($timezone)->format($format);
	}
	else
	{
		return $date->timezone($branding->timezone)->format($format);
	}
    
}