<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use GuzzleHttp\Client;
use Collection;

class Handler extends ExceptionHandler
{
    private $currencies;

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $this->currencies = collect();

        try {
            $client = new Client(['verify' => false]);
            $res = $client->get('https://online.mercury-europe.ru/export/default.php?samo_action=api&version=1.0&oauth_token=5104feaa290d42d7a60d4b8710451fcd&type=json&action=Currency_CURRENCIES');
            $currencyBody = json_decode($res->getBody()->getContents())->Currency_CURRENCIES;

            foreach ($currencyBody as $currencyBase) {
                if ($currencyBase->name == "RUB") {
                    foreach ($currencyBody as $currency) {
                        if ($currency->name == "USD" || $currency->name == "EUR" || $currency->name == "CNY") {
                            $res = $client->get('https://online.mercury-europe.ru/export/default.php?samo_action=api&version=1.0&oauth_token=5104feaa290d42d7a60d4b8710451fcd&type=json&action=Currency_RATES&CURRENCY=' . $currency->id . '&CURRENCYBASE=' . $currencyBase->id);
                            $currencyContent = json_decode($res->getBody()->getContents())->Currency_RATES[0];
                            $this->currencies->push((object)[
                                'currency' => $currency->name . "/" . $currencyBase->name,
                                'rate' => round($currencyContent->rate, 2),
                            ]);
                        }
                    }
                }
            }
        } catch (\Throwable $th) {
        }

        if ($this->isHttpException($e)) {
            switch ($e->getStatusCode()) {
                case 404:
                    return response()->view('errors.404', ['exception' => $e, 'currencies' => $this->currencies], 404);
                case 500:
                    return response()->view('errors.500', ['exception' => $e, 'currencies' => $this->currencies], 500);
            }
        }

        return parent::render($request, $e);
    }
}
