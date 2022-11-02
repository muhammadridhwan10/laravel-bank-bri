<?php

namespace Ridhwan\LaravelBankBri\Traits;

trait FundTransferExternal
{
    /**
     * FTEAccountValidation
     *
     * @param  string $bankCode
     * @param  string $beneficiaryAccount
     * @return \Ridhwan\Response\Response
     */
    public function FTEAccountValidation(string $bankCode, string $beneficiaryAccount)
    {
        $requestUrl = sprintf(
            '%s%s?bankcode=%s&beneficiaryaccount=%s',
            $this->apiUrlExtra,
            $this->fundTransferExternal->account_validation,
            $bankCode,
            $beneficiaryAccount
        );

        return $this->sendRequest('GET', $requestUrl);
    }

    /**
     * FTETransfer
     *
     * @param  array $data
     * @return \Ridhwan\Response\Response
     */
    public function FTETransfer(array $data)
    {
        $requestUrl = $this->apiUrlExtra . $this->fundTransferExternal->transfer;

        return $this->sendRequest('POST', $requestUrl, $data);
    }

    /**
     * FTEListBankCode
     *
     * @return \Ridhwan\Response\Response
     */
    public function FTEListBankCode()
    {
        $requestUrl = "{$this->apiUrlExtra}{$this->fundTransferExternal->list_bank_code}";

        return $this->sendRequest('GET', $requestUrl);
    }
}
