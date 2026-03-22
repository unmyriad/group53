<?php

namespace App\Events;

use App\Models\InventoryTransaction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransactionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $transaction;
    public function __construct($transaction)
    {
        //
        $this->transaction = $transaction;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('stock-channel'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'transaction' => [
                'id' => $this->transaction->transaction_id,
                'created_at' => $this->transaction->created_at->format('M d, H:i'),
                'quantity_change' => $this->transaction->quantity_change,
                'type' => $this->transaction->type,
                'user' => $this->transaction->user ? $this->transaction->user->name : 'System',
                'product_name' => $this->transaction->product->product_name ?? 'Deleted Product'
            ]
        ];
    }
    public function broadcastAs(): string
    {
        return 'transaction_event';
    }
}
