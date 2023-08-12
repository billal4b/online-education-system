<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundPledge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'post_code',
        'contact',
        'email',
        'ref_name',
        'relationship',
        'ref_contact',
        'ref_email',
        'fund_amount',
        'pledge_clause',
        'pledge_time',
        'issue_date',
        'is_active',
    ];
}
