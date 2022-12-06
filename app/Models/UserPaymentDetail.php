<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaymentDetail extends Model
{
    use HasFactory;
    protected $table = "user_payment_details";
    protected $fillable = [
       'user_id',
       'name',
       'apartment',
       'city',
       'provience',
       'zip',
       'country',
       'street',
   ];
   public $timestamps=true;
}
