<?php

namespace App\Repositories\InvoiceConfiguration;

use Illuminate\Database\Eloquent\Model;

class InvoiceConfiguration extends Model
{
    protected $table = 'invoice_configuration';

    protected $fillable = ['user_id','settings'];
}
