<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationInformation extends Model
{
    use HasFactory;
    protected $table = 'donation_information';

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bank_name',
        'account_number',
        'donation_type',
    ];
}
