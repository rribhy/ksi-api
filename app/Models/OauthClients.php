<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OauthClients extends Model
{
    use HasFactory;

    protected $table = 'oauth_clients';
    protected $guarded = []; // atau definisikan $fillable sesuai kebutuhan
}
