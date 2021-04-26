<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Company\CompanyProduct;
use App\Models\Company\CompanyNews;
use App\Models\Subscription\Subscription;
use App\Enums\Subscription\TypeEnum;

class TestController extends Controller {
	public function index() {
		return view('welcome', [
			'users' => [
				'employee' 	=> User::has('employee')
					->whereHas('subscriptions',
						fn ($q) => $q->byType(TypeEnum::All)
					)->first(),
				'just-user'	=> User::doesntHave('employee')
					->whereHas('subscriptions',
						fn ($q) => $q->byType(TypeEnum::All)
					)->first(),
			]
		]);
	}

	public function changeUser(int $id = 1) {
		auth()->loginUsingId($id);
		return back();
	}

	public function createProduct() :CompanyProduct {
		$user = auth()->user();
		$company = $user->subscriptions()->byType(TypeEnum::CompanyProduct)
					->inRandomOrder()->first()->company->id;
		return CompanyProduct::factory()->create([
		    'company_id' => $company
		]);
	}

	public function createNews() :CompanyNews {
		$user = auth()->user();
		$company = $user->subscriptions()->byType(TypeEnum::CompanyNews)
					->inRandomOrder()->first()->company->id;
		return CompanyNews::factory()->create([
		    'company_id' => $company
		]);
	}
}
