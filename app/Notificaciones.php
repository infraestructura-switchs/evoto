<?php

namespace diser;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
	protected $table='notificaciones'; 

	protected $fillable = [
		'em_inicio_elecc',
		'em_conf_voto',
		'sms_inicio_elecc','sms_conf_voto'
	];


	 public static  function isEmailInicioEleccion()
	{
		$email = Notificaciones::first();

		if ($email->em_inicio_elecc == 'S') {
			return true;
		} else {
			return false;
		}
	}


	 public static  function isEmailConfirmarVoto()
	{
		$email = Notificaciones::first();

		if ($email->em_conf_voto == 'S') {
			return true;
		} else {
			return false;
		}
	}


	 public static  function isSmsInicioEleccion()
	{
		$email = Notificaciones::first();

		if ($email->sms_inicio_elecc == 'S') {
			return true;
		} else {
			return false;
		}
	}


	 public static  function isSmsConfirmarVoto()
	{
		$email = Notificaciones::first();

		if ($email->sms_conf_voto == 'S') {
			return true;
		} else {
			return false;
		}
	}
}
