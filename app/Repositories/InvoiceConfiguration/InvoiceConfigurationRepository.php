<?php namespace App\Repositories\InvoiceConfiguration;


class InvoiceConfigurationRepository implements InterfaceInvoiceConfiguration
{
    function __construct(InvoiceConfiguration $invoice_configuration)
    {
        $this->invoice_configuration = $invoice_configuration;
    }
    

    public function update(array $data)
    {
        $invoice_configuration = $this->invoice_configuration->where('user_id', $data['user_id'])
            ->first();

        if($invoice_configuration){
            $invoice_configuration->user_id = $data['user_id'];
            $invoice_configuration->settings = (isset($data['settings']) && is_array($data['settings'])) ? json_encode($data['settings'],true) : [];
            $saved = $invoice_configuration->save();
            return $saved;
        }else{
            return $this->store($data);
        }
    }

    public function store(array $data)
    {
        $invoice_configuration = new InvoiceConfiguration();
        $invoice_configuration->user_id = $data['user_id'];
        $invoice_configuration->settings = json_encode($data['settings'],true);
        $saved = $invoice_configuration->save();
        return $saved;
    }
}
