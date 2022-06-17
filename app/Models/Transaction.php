<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'package_price',
        'title',
        'payment_mode',
        'price',
        'pending_price',
        'bank_name',
        'check_number',
        'check_number',
        'check_date',
        'check_amount',
        'upi_type', 
        'upi_id', 
        'upi_amount', 
        'cash_mode',
        'cash_amount', 
        'cash_date', 
        'note', 
        'company_id',
        'receive_by',
        'enquiry_id',   
    ];
    
    public function User()
    {
        return $this->belongsTo(User::class,'receive_by');
    }

    public function Enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
}
