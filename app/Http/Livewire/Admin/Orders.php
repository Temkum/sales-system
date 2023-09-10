<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client as ModelsClient;
use App\Models\Order;
use App\Notifications\OrderTransaction;
use Illuminate\Notifications\Messages\VonageMessage;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\Console\Helper\ProgressBar;
use Twilio\Rest\Client;

class Orders extends Component
{
    public $sort_by;
    public $search;
    public $start_date = '';
    public $end_date = '';
    public Int $page_number;
    public $msg = '';
    public $updateMode = false;
    public $price, $advance, $quantity, $description, $due_date, $balance;
    public $current_page = 1;
    public $client_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete' => 'deleteSale',
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function render()
    {
        $this->page_number = 15;
        $this->page = $this->current_page;

        $orders = Order::query()
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->where('orders.price', 'LIKE', '%' . $this->search . '%')
            ->orWhere('orders.advance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('orders.balance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('orders.status', 'LIKE', '%' . $this->search . '%')
            ->orWhere('clients.name', 'LIKE', '%' . $this->search . '%')
            ->select('orders.*', 'clients.name as client_name')
            ->orderBy('orders.created_at', 'DESC')->paginate($this->page_number);

        if ($this->client_id) {
            $orders->where("orders.client_id", $this->client_id);
        }

        if (($this->start_date && $this->end_date) && $this->start_date) {
            $orders = Order::where('created_at', '>=', $this->start_date)
                ->where('created_at', '<=', $this->end_date)->paginate($this->page_number);
        }

        return view('livewire.admin.orders', ['orders' => $orders])->extends('base');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatingPage()
    {
        $this->current_page = $this->page;
    }

    public function updateSaleStatus($sale_id, $status)
    {
        $sale = Order::find($sale_id);
        $sale->status = $status;

        if ($status == 'completed') {
            $sale->date_delivered = DB::raw('CURRENT_DATE');
            /*
            try {         
            // vonage api               
            /* Notification::route('vonage', env('VONAGE_SMS_FROM'))
                    ->notify(new OrderTransaction()); 
            } catch (\Throwable $th) {
                return noty()->progressBar(false)->addError('Something went wrong. </br> Could not send message!');
            }
            */

            $twilio = new Client(config('services.twilio.account_sid'), config('services.twilio.auth_token'));

            try {
                /* $message = $twilio->messages
                    ->create(
                        "+237675827455", // to
                        array(
                            "from" => "+12177278323",
                            "body" => "Your order has been completed. Please drop by the shop to pick it up. Thanks for trusting us!"
                        )
                    ); */

                // whatsapp msg
                $message = $twilio->messages
                    ->create(
                        "whatsapp:+23775827455", // to
                        array(
                            "from" => "whatsapp:+14155238886",
                            "body" => __("Your order has been completed. Please drop by the shop to pick it up. Thanks for trusting us! Call 1-800-555-5555 for more information.")
                        )
                    );
            } catch (\Throwable $th) {
                noty()->progressBar(false)->addError('Something went wrong. </br> Could not send message!');
                throw $th;
            }
        } elseif ($status == 'cancelled') {
            $sale->date_cancelled = DB::raw('CURRENT_DATE');
        }
        $sale->save();

        return notyf()
            ->position('x', 'center')
            ->position('y', 'bottom')
            ->duration(2000)->addSuccess('Status updated successfully!');
    }

    public function confirmDelete(int $id)
    {
        $this->dispatchBrowserEvent('swal-confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' =>  $id
        ]);
    }

    public function deleteSale($id)
    {
        $sale = Order::find($id);

        if ($sale) {
            $sale->delete();
            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->duration(2000)
                ->addSuccess('Record deleted successfully');
        } else {
            notyf()->position('x', 'right')->position('y', 'top')->addError('Record not found');
        }
    }

    /**
     * Retrieves the deleted records from the database.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function deletedRecords()
    {
        $deleted_records = Order::onlyTrashed()->paginate(20);

        return view('livewire.admin.deleted-records', ['deleted_records' => $deleted_records])->extends('base');
    }
}
