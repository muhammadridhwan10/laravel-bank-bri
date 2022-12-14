<?php

namespace Ridhwan\LaravelBankBri\Traits;

trait FundTransferInternal
{
    /**
     * FTIAccountValidation
     *
     * @param  string $sourceAccount
     * @param  string $beneficiaryAccount
     * @return \Ridhwan\Response\Response
     */
    public function FTIAccountValidation(string $sourceAccount, string $beneficiaryAccount)
    {
        if (strlen($sourceAccount) < 15) {
            $sourceAccount = '0' . $sourceAccount;
        }

        if (strlen($beneficiaryAccount) < 15) {
            $beneficiaryAccount = '0' . $beneficiaryAccount;
        }

        $requestUrl = sprintf(
            '%s%s?sourceaccount=%s&beneficiaryaccount=%s',
            $this->apiUrlExtra,
            $this->fundTransferInternal->account_validation,
            $sourceAccount,
            $beneficiaryAccount
        );

        return $this->sendRequest('GET', $requestUrl);
    }

    /**
     * FTITransfer
     *
     * @param  array $data
     * @return \Ridhwan\Response\Response
     */
    public function FTITransfer(array $data)
    {
        $requestUrl = $this->apiUrlExtra . $this->fundTransferInternal->transfer;

        return $this->sendRequest('POST', $requestUrl, $data);
    }

    /**
     * FTICheckStatus
     *
     * @param  string $noReferral
     * @return \Ridhwan\Response\Response
     */
    public function FTICheckStatus(string $noReferral)
    {
        $requestUrl = "{$this->apiUrlExtra}{$this->fundTransferInternal->check_status}?noReferral={$noReferral}";

        return $this->sendRequest('GET', $requestUrl);
    }
}
