<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konsultasi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'konsultasi';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_whatsapp',
        'deskripsi_masalah',
        'file_path',
        'tanggal_diajukan',
        'jam_diajukan',
        'status',
        'tanggal_baru',
        'jam_baru',
        'assigned_to_admin_id',
    ];

    /**
     * Get the assigned admin for the consultation.
     */
    public function assignedToAdmin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to_admin_id');
    }
    public function messages()
    {
        return $this->hasMany(WhatsappMessage::class, 'konsultasi_id');
    }
    protected $casts = [
        'tanggal_diajukan' => 'date',
        'tanggal_baru' => 'date',
    ];
}