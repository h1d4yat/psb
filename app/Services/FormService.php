<?php

namespace App\Services;

use App\Exceptions\FormException;
use App\Models\Form;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FormService
{

    public function simpanBiodata(array $data)
    {
        try {
            Auth::user()->form()->update($data);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw new FormException($th->getMessage());
        }
    }

    public function getForm(User|Authenticatable $user){
       return Form::where('user_id', $user->id)->first()->toArray();
    }
    public function getBiodata(User|Authenticatable $user)
    {
        $biodata = $this->getForm($user);
        return array_intersect_key($biodata, array_flip($this->getFieldObjects('biodata')));
    }
    public function getAlamat(User|Authenticatable $user){
        $data = $this->getForm($user);
        return array_intersect_key($data, array_flip($this->getFieldObjects('alamat')));

    }

    public function getFieldObjects(string $key = null): array
    {
        $fields = [
            'biodata' => ['nisn', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'golongan_darah', 'tempat_tinggal', 'alat_transportasi', 'no_telp', 'email', 'pas_foto', 'no_kip', 'no_kis', 'no_kks', 'no_sktm', 'hobi', 'cita_cita'],
            'alamat' => ['rt', 'rw', 'dusun', 'jalan', 'kabupaten', 'provinsi', 'kecamatan', 'desa', 'kode_pos'],
            'data_priodik' => ['tinggi_badan', 'berat_badan', 'jarak_rumah_kesekolah', 'anak_ke', 'jumlah_saudara_kandung'],
        ];
        if ($key && is_string($key)) {
            return $fields[$key];
        }

        return $fields;
    }

    public function getProgress()
    {
      
       try {
        $form = auth()->user()->form;
        $percent = array_combine(array_keys($this->getFieldObjects()), array_fill(1, count($this->getFieldObjects()), 0));
        $fields = $this->getFieldObjects();

        foreach ($fields as $key => $field) {
            foreach ($field as $f) {
                if (null != $form[$f] && $key != 'pas_foto') {
                    ++$percent[$key];
                }
            }
            $percent[$key] =round( $percent[$key] / count($field) * 100);
        }
        
        return $percent;
       } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return;
       }
    }
}
