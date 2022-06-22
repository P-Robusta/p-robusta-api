<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorInformation extends Model
{
    use HasFactory;
    protected $table = 'donor_information';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'donor_name',
        'total_donation_amount',
        'latest_donation_amount',
        'currency_unit',
        'donor_type',
        'num_of_donation',
        'start_donate',
        'latest_donate',
    ];
}
