<?php 

namespace App\Traits;

use App\Models\Benefit;
use App\Models\City;
use App\Models\Divition;
use App\Models\EmploymentType;
use App\Models\Field;
use App\Models\FieldSpecialization;
use App\Models\Province;
use App\Models\Step;
use App\Models\Unit;

trait DataTrait {
	public static function getBenefits() {
		return Benefit::all();
	}

	public static function getProvinces() {
		return Province::all();
	}

	public static function getAllCities() {
		return City::all()->sortBy('city');
	}

	public static function getCities($province_id) {
		return City::whereProvinceId($province_id)->sortBy('city');
	}

	public static function getDivitions() {
		return Divition::all();
	}

	public static function getUnits($divition_id) {
		return City::whereDivitionId($divition_id);
	}

	public static function getEmploymentTypes() {
		return EmploymentType::all();
	}

	public static function getFields() {
		return Field::all();
	}


	public static function getAllSpecializations() {
		return FieldSpecialization::all();
	}

	public static function getSpecializations($field_id) {
		return FieldSpecialization::whereFieldId($field_id);
	}

	public static function getSteps() {
		return Step::all();
	}
}